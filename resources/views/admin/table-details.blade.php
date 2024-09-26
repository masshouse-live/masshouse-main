@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Table Details & Reservations</h2>
        </div>
        <div class="flex w-full px-4">
            <h2 class="text-3xl font-bold"> {{ $table->number_seats }} Seater Tables</h2>
        </div>
        <div class="overflow-auto">
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
                @php
                    // Example reservations
                    $tables = [
                        // Example reservations structure
                        [
                            [
                                'start' => 8,
                                'end' => 10,
                                'customer' => 'John Doe',
                            ],
                            [
                                'start' => 11,
                                'end' => 12,
                                'customer' => 'Jane Smith',
                            ],
                            [
                                'start' => 15,
                                'end' => 19,
                                'customer' => 'Michael Brown',
                            ],
                            [
                                'start' => 20,
                                'end' => 23,
                                'customer' => 'Michael Brown',
                            ],
                            [
                                'start' => 19,
                                'end' => 20,
                                'customer' => 'Michael Brown',
                            ],
                        ],
                        [
                            [
                                'start' => 9,
                                'end' => 11,
                                'customer' => 'Alice Green',
                            ],
                            [
                                'start' => 12,
                                'end' => 14,
                                'customer' => 'Bob White',
                            ],
                            [
                                'start' => 20,
                                'end' => 22,
                                'customer' => 'Bob White',
                            ],
                        ],
                    ];
                @endphp

                @foreach ($tables as $tableId => $reservations)
                    <div class="shadow-lg rounded-lg flex">
                        <!-- Table Name Column -->
                        <div class="time-slot font-semibold text-center border text-white min-w-24"
                            style="width: 100px; border-right: 1px solid #ddd;">
                            Table {{ $tableId + 1 }}
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
                                    // Total range of hours in the calendar
                                    $totalHours = $settings->reservation_to - $settings->reservation_from;
                                    $occuredBorderPixels = $settings->reservation_from - $reservation['start'];
                                    // Calculate the left offset as a percentage of the time range
                                    $startOffset =
                                        (($reservation['start'] - $settings->reservation_from) / $totalHours) * 100;
                                    $housrDiff = $reservation['end'] - $reservation['start'];
                                    $width = (($reservation['end'] - $reservation['start']) / $totalHours) * 100;
                                @endphp


                                <!-- Reservation box -->
                                <div class="absolute text-xs text-white "
                                    style="
                                     left: calc({{ $startOffset + 0.4 * $occuredBorderPixels }}%);
                                     width: calc({{ $width - 0.4 * $housrDiff }}%);
                                     height: 100%;
                                     top: 0;
                                     display: flex;
                                     align-items: center;
                                     justify-content: center;
                                     border-radius: 4px;
                                     box-sizing: border-box;">
                                    <span
                                        style="background-color: {{ sprintf('#%06X', mt_rand(0, 0xffffff)) }}; width: 100%; position: absolute;"
                                        class="rounded px-2 py-1">
                                        {{ $reservation['customer'] }} - Oct 20, 2024 ({{ $reservation['start'] }}:00 -
                                        {{ $reservation['end'] }}:00)
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        {{-- create overlay with width total hours --}}


                    </div>
                @endforeach
            </div>
        </div>

    </main>
@endsection
