@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-4 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Dashboard</h2>
        </div>


        <div class="flex flex-col px-4 gap-5">
            <div class="grid grid-cols-12 gap-10 justify-center">
                <div class="col-span-7 flex flex-col gap-2">
                    <h1 class="text-xl font-bold text-accent">Table Reservation Trends</h1>

                    <div class="relative py-5 w-full bg-secondary px-2 rounded aspect-[16/7] overflow-auto">
                        <select
                            class="filter-input absolute right-2 top-2 border bg-primary border-accent/20 rounded-md px-5 pr-10 py-1 ">
                            <option value="month">1 Month</option>
                            <option value="week">1 Week</option>
                            <option value="day">1 Day</option>
                        </select>
                        <canvas id="reservation-chart" class="w-full h-full"></canvas>
                    </div>
                </div>
                <div class="col-span-5 flex flex-col gap-2"">
                    <h1 class="text-xl font-bold text-accent">Reservation Turnover</h1>
                    <div class="flex flex-col bg-secondary px-5 h-full rounded">
                        <div class="grid grid-cols-4 h-full">
                            <div class="relative py-5 w-full px-2 rounded overflow-hidden aspect-square col-span-2 h-full ">
                                <canvas id="reservation-donut-chart"
                                    class="w-full  overflow-hidden rounded aspect-square"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-10 justify-center pb-5">
                <div class="col-span-5  pb-7">
                    <h1 class="text-xl font-bold text-accent h-9"></h1>
                    <div class="flex flex-col bg-secondary px-5 h-full rounded">
                        <div class="grid grid-cols-4 h-full">
                            <div class="relative py-5 w-full px-2 rounded overflow-hidden aspect-square col-span-2 h-full ">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-7 flex flex-col gap-2">
                    <h1 class="text-xl font-bold text-accent">Merchandise Order Trends</h1>

                    <div class="relative py-5 w-full bg-secondary px-2 rounded aspect-[16/7] overflow-auto">
                        <select
                            class="filter-input absolute right-2 top-2 border bg-primary border-accent/20 rounded-md px-5 pr-10 py-1 ">
                            <option value="month">1 Month</option>
                            <option value="week">1 Week</option>
                            <option value="day">1 Day</option>
                        </select>
                        <canvas id="orders-chart" class="w-full h-full"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <span id="data-container" data-reservations="{{ $reservationTrend }}" class="h-0"></span>
        <span id="orders-data-container" data-orders="{{ $ordersTrend }}"></span>
    </main>
@endsection
