<?php

namespace App\Http\Controllers;

use App\Models\ReservationTrend;
use App\Models\SiteSttings;
use App\Models\Table;
use App\Models\TableReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TableReservationNotification;


function createICS($customerName, $fromDateTime, $toDateTime, $tableIndex)
{
    $icsContent = "BEGIN:VCALENDAR\r\n";
    $icsContent .= "VERSION:2.0\r\n";
    $icsContent .= "CALSCALE:GREGORIAN\r\n";
    $icsContent .= "METHOD:REQUEST\r\n";
    $icsContent .= "BEGIN:VEVENT\r\n";
    $icsContent .= "UID:" . uniqid() . "@yourdomain.com\r\n"; // Unique ID for the event
    $icsContent .= "SUMMARY:Table Reservation for $customerName\r\n";
    $icsContent .= "DTSTART:" . $fromDateTime->utc()->format('Ymd\THis\Z') . "\r\n"; // Start time in UTC
    $icsContent .= "DTEND:" . $toDateTime->addMinute()->utc()->format('Ymd\THis\Z') . "\r\n"; // End time in UTC
    $icsContent .= "DESCRIPTION:Reservation Details:\nCustomer Name: $customerName\nTable Index: $tableIndex\r\n";
    $icsContent .= "LOCATION:Your Restaurant Address\r\n";
    $icsContent .= "STATUS:CONFIRMED\r\n";
    $icsContent .= "END:VEVENT\r\n";
    $icsContent .= "END:VCALENDAR\r\n";

    return $icsContent;
}

class TableReservationController extends Controller
{
    public function reserve_table(Request $request)
    {
        $request->validate([
            "table_id" => 'required',
            'from_time' => 'required|date_format:H:i',
            'to_time' => 'required|date_format:H:i|after:from_time',
            'date' => 'required|date_format:Y-m-d',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:255',
        ]);

        // Parse input date and times
        $date = $request->input('date');
        $fromTime = $request->input('from_time');
        $toTime = $request->input('to_time');

        // Convert to full datetime format
        $fromDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', "$date $fromTime");
        $toDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', "$date $toTime")->endOfHour();

        // Fetch reservation settings (reservation_from and reservation_to)
        $settings = SiteSttings::select('reservation_from', 'reservation_to')
            ->where('id', 1)
            ->first();

        // Convert the settings to Carbon time instances
        $reservationFromTime = \Carbon\Carbon::createFromFormat('H', $settings->reservation_from)->setDate($fromDateTime->year, $fromDateTime->month, $fromDateTime->day);
        $reservationToTime = \Carbon\Carbon::createFromFormat('H', $settings->reservation_to)->endOfHour()->setDate($fromDateTime->year, $fromDateTime->month, $fromDateTime->day);

        // Check if the requested time is within the allowed range
        if (
            $fromDateTime->lt($reservationFromTime) ||
            $toDateTime->gt($reservationToTime)
        ) {
            return response()->json(['error' => 'Selected time is outside of allowed reservation hours.'], 400);
        }


        // Get the total number of tables from the Table model
        $table = Table::find($request->table_id);
        $totalTables = $table->total_tables;

        // Create an array of table indices and shuffle it
        $tableIndices = range(1, $totalTables);
        shuffle($tableIndices); // Shuffle the indices for random selection

        // Check for available table_index
        foreach ($tableIndices as $tableIndex) {
            // Check for existing reservations
            $existingReservations = TableReservation::where('table_id', $table->id)
                ->where('table_index', $tableIndex)
                ->where(function ($query) use ($fromDateTime, $toDateTime) {
                    $query->where(function ($query) use ($fromDateTime, $toDateTime) {
                        // Include all scenarios where there is an overlap
                        $query->whereBetween('from_date', [$fromDateTime, (clone $toDateTime)->subSecond()]) // Exclude the exact end time
                            ->orWhereBetween('to_date', [$fromDateTime->addSecond(), $toDateTime]) // Exclude the exact start time
                            ->orWhere(function ($query) use ($fromDateTime, $toDateTime) {
                                $query->where('from_date', '<', (clone $toDateTime)->subSecond()) // Adjust to prevent overlap
                                    ->where('to_date', '>', (clone $fromDateTime)->addSecond());
                            });
                    });
                })
                ->exists();

            // If no existing reservations overlap, proceed to reserve this table_index
            if (!$existingReservations) {
                // Log the success and reservation for this table index
                Log::info("Table index " . $tableIndex . " is available. Reserving it.");

                TableReservation::create([
                    'customer_name' => $request->input('customer_name'),
                    'customer_email' => $request->input('customer_email'),
                    'customer_phone' => $request->input('customer_phone'),
                    'customer_address' => $request->input('customer_address'),
                    'from_date' => $fromDateTime,
                    'to_date' => $toDateTime,
                    'table_id' => $table->id,
                    'status' => 'placed',
                    'table_index' => $tableIndex,
                ]);
                // Add to trend
                $date = $fromDateTime->format('Y-m-d');
                $hour = $fromDateTime->format('H');

                $reservationTrend = ReservationTrend::where('date', $date)->where('hour', $hour)->first();

                if ($reservationTrend) {
                    $reservationTrend->count = $reservationTrend->count + 1;
                    $reservationTrend->save();
                } else {
                    $reservationTrend = new ReservationTrend();
                    $reservationTrend->date = $date;
                    $reservationTrend->hour = $hour;
                    $reservationTrend->count = 1;
                    $reservationTrend->paid_reservation = 0;
                    $reservationTrend->amount = 0;
                    $reservationTrend->save();
                }

                $icsContent = createICS(
                    $request->input('customer_name'),
                    $fromDateTime,
                    $toDateTime,
                    $tableIndex
                );

                Mail::to($request->input('customer_email'))->send(new TableReservationNotification(
                    $request->input('customer_name'),
                    $fromDateTime->format('Y-m-d'),
                    $fromDateTime->format('H:i'),
                    $toDateTime->format('H:i'), // No need to add a minute here; it's done in ICS
                    $tableIndex,
                    $icsContent // Pass the ICS content
                ));

                return response()->json(['success' => 'Table reserved successfully!'], 200);
            }
        }

        // If no available table index was found
        return response()->json(['error' => 'No available tables for the selected time.'], 400);
    }


    public function available_times(Request $request, $tableId)
    {
        // Fetch reservation settings
        $settings = SiteSttings::select('reservation_from', 'reservation_to')->where('id', 1)->first();

        $availableTimes = [];
        $startHour = (int)$settings->reservation_from; // e.g., 8 for 8:00 AM
        $endHour = (int)$settings->reservation_to;     // e.g., 23 for 11:00 PM

        $table = Table::find($tableId);
        if (!$table) {
            return response()->json(['error' => 'Table not found'], 404);
        }

        $totalTables = $table->total_tables;

        for ($hour = $startHour; $hour <= $endHour; $hour++) {
            // Set from and to times
            $fromDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date . " $hour:00");
            $toDateTime = $fromDateTime->copy()->endOfHour(); // Set to the last second of the hour

            $isAvailable = false;

            // Check reservations for each table index
            for ($index = 1; $index <= $totalTables; $index++) {
                $existingReservations = TableReservation::where('table_id', $tableId)
                    ->where('table_index', $index)
                    ->where(function ($query) use ($fromDateTime, $toDateTime) {
                        $query->where(function ($query) use ($fromDateTime, $toDateTime) {
                            // Include all scenarios where there is an overlap
                            $query->whereBetween('from_date', [$fromDateTime, $toDateTime->subSecond()]) // Exclude the exact end time
                                ->orWhereBetween('to_date', [$fromDateTime->addSecond(), $toDateTime]) // Exclude the exact start time
                                ->orWhere(function ($query) use ($fromDateTime, $toDateTime) {
                                    $query->where('from_date', '<', $toDateTime->subSecond()) // Adjust to prevent overlap
                                        ->where('to_date', '>', $fromDateTime->addSecond());
                                });
                        });
                    })
                    ->exists();

                if (!$existingReservations) {
                    $isAvailable = true; // At least one table index is free
                    break; // No need to check further if one is available
                }
            }

            $availableTimes[] = [
                'time' => $hour,
                'available' => $isAvailable
            ];
        }

        return response()->json($availableTimes);
    }
}
