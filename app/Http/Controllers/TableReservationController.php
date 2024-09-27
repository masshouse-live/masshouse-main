<?php

namespace App\Http\Controllers;

use App\Models\SiteSttings;
use App\Models\Table;
use App\Models\TableReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $toDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', "$date $toTime");
        Log::info("From DateTime: " . $fromDateTime);
        Log::info("To DateTime: " . $toDateTime);
        // Fetch reservation settings (reservation_from and reservation_to)
        $settings = SiteSttings::select('reservation_from', 'reservation_to')
            ->where('id', 1)
            ->first();


        // Convert the settings to Carbon time instances
        $reservationFromTime = \Carbon\Carbon::createFromFormat('H', $settings->reservation_from);
        $reservationToTime = \Carbon\Carbon::createFromFormat('H', $settings->reservation_to);

        // Check if the requested time is within the allowed range
        if (
            $fromDateTime->lt($reservationFromTime) ||
            $toDateTime->gt($reservationToTime->addHour()) // Include the last hour
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
                        $query->where(function ($query) use ($fromDateTime, $toDateTime) {
                            $query->whereBetween('from_date', [$fromDateTime, (clone $toDateTime)->subSecond()]) // Exclude the exact end time
                                ->orWhereBetween('to_date', [$fromDateTime->addSecond(), $toDateTime]) // Exclude the exact start time
                                ->orWhere(function ($query) use ($fromDateTime, $toDateTime) {
                                    $query->where('from_date', '<', (clone $toDateTime)->subSecond()) // Adjust to prevent overlap
                                        ->where('to_date', '>', (clone $fromDateTime)->addSecond());
                                });
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
            $fromDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date . " $hour:00");
            $toDateTime = $fromDateTime->copy()->addHour();

            $isAvailable = false;

            // Check reservations for each table index
            for ($index = 1; $index <= $totalTables; $index++) {
                $existingReservations = TableReservation::where('table_id', $tableId)
                    ->where('table_index', $index)
                    ->where(function ($query) use ($fromDateTime, $toDateTime) {
                        $query->where(function ($query) use ($fromDateTime, $toDateTime) {
                            // Include all scenarios where there is an overlap
                            $query->where(function ($query) use ($fromDateTime, $toDateTime) {
                                $query->whereBetween('from_date', [$fromDateTime, $toDateTime->subSecond()]) // Exclude the exact end time
                                    ->orWhereBetween('to_date', [$fromDateTime->addSecond(), $toDateTime]) // Exclude the exact start time
                                    ->orWhere(function ($query) use ($fromDateTime, $toDateTime) {
                                        $query->where('from_date', '<', $toDateTime->subSecond()) // Adjust to prevent overlap
                                            ->where('to_date', '>', $fromDateTime->addSecond());
                                    });
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
