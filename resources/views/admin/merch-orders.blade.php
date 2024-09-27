@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Cusomers' Merch Orders</h2>
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter Merch Orders</h2>
                <div class="flex justify-between items-center">
                    <div class="flex py-3 gap-5">
                        <div class="flex flex-col space-y-2">
                            <label for="from_date" class="text-textSecondary font-semibold">
                                From Date
                            </label>
                            <input type="date" id="from_date"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="from_date" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="to_date" class="text-textSecondary font-semibold">
                                To Date
                            </label>
                            <input type="date"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="to_date" id="to_date" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="status" class="text-textSecondary font-semibold">
                                Status
                            </label>
                            <select class="filter-input border border-accent/20 bg-primary rounded-md px-5 py-1 "
                                name="status" id="status">
                                <option value="">All</option>
                                <option value="order_placed">Order Placed</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <form class="flex flex-col space-y-2">
                            <label for="search" class="text-textSecondary font-semibold ">
                                Search
                            </label>
                            <input type="search"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="search" id="search" />
                            @php
                                foreach ($_GET as $key => $value) {
                                    $key = htmlspecialchars($key);
                                    if ($key != 'search') {
                                        $value = htmlspecialchars($value);
                                        echo "<input type='hidden' name='$key' value='$value'/>";
                                    }
                                }
                            @endphp
                            <button class="hidden"></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow ">
                <div class="grid grid-cols-7 item-end text-end gap-2 font-medium">
                    <a class="text-start flex justify-start space-x-0.5">
                        <span>Order ID</span>

                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Email</span>

                    </a>
                    <a class="flex w-full justify-end ">
                        Phone

                    </a>
                    <a class="flex  w-full justify-end">
                        Order Date

                    </a>
                    <span>Total Amount</span>
                    <a class="flex  w-full justify-end">
                        Status

                    </a>
                    <span>Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow flex flex-col gap-3">
                @foreach ($merch_orders as $merch_order)
                    <div class="flex flex-col space-y-2">
                        <div class="grid grid-cols-7 item-end text-end gap-2 font-medium"
                            onclick="showDetails('merch-order{{ $merch_order->id }}')">
                            {{-- make id start with 5 zeros if length less than 4 --}}
                            <div class="text-start flex space-x-2 items-center">
                                <span class="text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5 -mt-1">
                                        <path fillRule="evenodd"
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                            clipRule="evenodd" />
                                    </svg>
                                </span>
                                <button> #{{ $merch_order->order_id }} </button>
                            </div>
                            <span>{{ $merch_order->email }}</span>
                            <span>{{ $merch_order->phone }}</span>
                            {{-- date make human readable --}}
                            <span>
                                {{ $merch_order->created_at->format('D M j, Y H:i') }}
                            </span>
                            {{-- format amount to include comma --}}
                            <span>KES. {{ number_format($merch_order->total, 2, '.', ',') }}</span>
                            <span>{{ $merch_order->status }}</span>
                            <span>View</span>
                        </div>
                        <div class="order-details" id="merch-order{{ $merch_order->id }}">
                            <div class="grid grid-cols-2 py-2 bg-secondary px-2 w-full">
                                <div class="text-start flex flex-col space-x-2 items-center">
                                    <div class="space-x-2 grid grid-cols-2 w-full font-semibold py-2 divide-2">
                                        <span></span>
                                        <div class="grid grid-cols-4 divide gap-2 text-center">
                                            <span>Quantity</span>
                                            <span>Price</span>
                                            <span>Color</span>
                                            <span>Size</span>
                                        </div>
                                    </div>

                                    <div class=" py-2 border items-center rounded gap-2 divide-y">
                                        @foreach ($merch_order->product_orders as $merch_order_item)
                                            <div class="space-x-2 text-center grid grid-cols-2 w-full items-center">
                                                <div class="space-x-2 flex text-left px-2 py-2">
                                                    <img class="w-12 h-12 rounded"
                                                        src="{{ asset('images/ph/merch2-ph.PNG') }}" alt="default image">
                                                    <span class="font-semibold">
                                                        {{ $merch_order_item->merchandise->name }}
                                                    </span>
                                                </div>
                                                <div class="grid grid-cols-4 divide gap-2 text-center">
                                                    <span>{{ $merch_order_item->quantity }}</span>
                                                    <span>
                                                        kes.{{ number_format($merch_order_item->price, 2, '.', ',') }}</span>
                                                    <div>
                                                        <span class="capitalize p-1 rounded shadow"
                                                            style="background-color: {{ $merch_order_item->color }}">{{ $merch_order_item->color }}</span>
                                                    </div>
                                                    <span class="uppercase">{{ $merch_order_item->size }}</span>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="text-end flex flex-col  items-start py-5 px-5 w-full mt-4">
                                    <h2><b>Customer Name: </b> {{ $merch_order->name }}</h2>
                                    <h2><b>Customer Email :</b> {{ $merch_order->email }}</h2>
                                    <h2><b>Customer Phone :</b> {{ $merch_order->phone }}</h2>
                                    <h2><b>Customer Address :</b> {{ $merch_order->address }}</h2>
                                    <h2><b>Customer City :</b> {{ $merch_order->city }}</h2>
                                    <h2><b>Customer Zip :</b> {{ $merch_order->zip }}</h2>
                                    <h2><b>Total Amount :</b> kes.{{ number_format($merch_order->total, 2, '.', ',') }}
                                    </h2>
                                    <h2><b>Status :</b> {{ $merch_order->status }}</h2>
                                    <div class="flex justify-end items-center w-full">
                                        <select class="border border-accent/20 bg-primary rounded-md px-5 py-1 "
                                            name="status" id="order_status${ $merch_order->id }"
                                            value="{{ $merch_order->status }}">
                                            >
                                            <option disabled selected value="">--Update Status--</option>
                                            <option value="pending">Processing</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $merch_orders->links('pagination::tailwind') }}
        </div>
    </main>
@endsection
