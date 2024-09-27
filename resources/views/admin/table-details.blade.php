@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Table Details & Reservations</h2>
        </div>
        <f class="flex w-full px-4 justify-between items-center">
            <h2 class="text-3xl font-bold"> {{ $table->number_seats }} Seater Tables</h2>
            <input type="date" name="date" class="border-2 rounded px-3 py-1 bg-primary filter-input" />
        </f>
        <div class="overflow-auto h-auto py-3">
            <!-- Time Slot Row (header) -->
            <div class="calendar flex px-4">
                <div class="min-w-24" style="width: 100px;"></div> <!-- Empty first cell for table labels -->
                @for ($hour = $settings->reservation_from; $hour <= $settings->reservation_to; $hour++)
                    <!-- Time range from 7 AM to 7 PM -->
                    <div class="time-slot text-center font-semibold min-w-24"
                        style="flex: 1; border: 1px solid #ddd; box-sizing: border-box;">
                        {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00
                    </div>
                @endfor
            </div>

            <!-- Table Rows -->
            <div class="px-4 dividex-2 flex flex-col">


                @foreach ($groupedReservations as $index => $reservations)
                    <div class="shadow-lg rounded-lg flex">
                        <!-- Table Name Column -->
                        <div class="time-slot font-semibold text-center border text-white min-w-24 sticky"
                            style="width: 100px; border-right: 1px solid #ddd;">
                            Table {{ $loop->index + 1 }}
                        </div>
                        <!-- Time Slots (each row representing a table) -->
                        <div class="relative flex-1"
                            style="display: flex; border: 1px solid #ddd; border-left: none; height: 100px; position: relative; box-sizing: border-box;">
                            <!-- Render the time division background (hourly slots) -->
                            @for ($hour = $settings->reservation_from; $hour <= $settings->reservation_to; $hour++)
                                <div class="time-slot min-w-24 "
                                    style="flex: 1; border-right: 1px solid #ddd; box-sizing: border-box;"></div>
                            @endfor

                            <!-- Render each reservation -->
                            @foreach ($reservations as $reservation)
                                @php
                                    // Convert timestamps into hour values for start and end times
                                    $startHour = \Carbon\Carbon::parse($reservation['from_date'])->format('H');
                                    $endHour = \Carbon\Carbon::parse($reservation['to_date'])->format('H');

                                    // Total range of hours in the calendar (e.g., 8 AM to 11 PM)
                                    $totalHours = $settings->reservation_to - $settings->reservation_from;

                                    // Calculate startOffset based on the difference from the reservation start time to the calendar start
                                    $startOffset = (($startHour - $settings->reservation_from) / $totalHours) * 100;

                                    $hoursDiff = $endHour - $startHour;
                                    $width = ($hoursDiff / $totalHours) * 100;
                                    $occuredBorderPixels = $settings->reservation_from - $startHour;
                                @endphp
                                <div class="absolute text-xs text-white "
                                    style="
                                        left: calc({{ $startOffset + 0.18003 * $occuredBorderPixels }}%);
                                        width: calc({{ $width - 0.19 * $hoursDiff }}%);
                                        height: 100%;
                                        top: 0;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        border-radius: 4px;
                                        box-sizing: border-box;">
                                    <span onclick="viewReservationDetails('view-reservation',{{ $reservation }})"
                                        style="background-color: {{ sprintf('#%06X', mt_rand(0, 0xffffff)) }}; width: 100%; position: absolute;"
                                        class="rounded px-2 py-1 cursor-pointer">
                                        {{ $reservation['customer_name'] }} -
                                        {{ \Carbon\Carbon::parse($reservation['from_date'])->format('M d, Y') }}
                                        ({{ $startHour }}:00 - {{ $endHour }}:00)
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>
    <div class="flex space-x-2">
        <div id="view-reservation"
            class="modal hidden z-50 fixed h-screen inset-0 bg-primary/50 backdrop-blur-sm justify-center items-center -top-0 pb-0">
            <div class="rounded shadow p-4 w-full h-full flex flex-col overflow-auto ">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-bold"></h2>
                    <button class="text-2xl font-bold" onclick="closeDialog('view-reservation')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div
                    class="max-w-screen-sm w-full mx-auto bg-primary overflow-auto shadow-xl border rounded-2xl border-accent/20 py-10 px-5">
                    <div class="flex flex-col" id="reservation-details">
                    </div>
                </div>
            </div>
        </div>
    @endsection
