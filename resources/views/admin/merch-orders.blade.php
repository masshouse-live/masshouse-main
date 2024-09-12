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
                                class="border border-accent/20 bg-primary rounded-md px-2 py-1" name="from_date"
                                defaultValue={searchParams?.from_date} />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="to_date" class="text-textSecondary font-semibold">
                                To Date
                            </label>
                            <input type="date" class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                                name="to_date" id="to_date" defaultValue={searchParams?.to_date} />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="status" class="text-textSecondary font-semibold">
                                Status
                            </label>
                            <select class="border border-accent/20 bg-primary rounded-md px-5 py-1 " name="status"
                                id="status">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <form class="flex flex-col space-y-2">
                            <label for="search" class="text-textSecondary font-semibold">
                                Search
                            </label>
                            <input type="search" class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                                name="search" id="search" defaultValue={searchParams?.search} />
                            <button class="hidden"></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow ">
                <div class="grid grid-cols-7 item-end text-end gap-2 font-medium">
                    <a class="text-start flex justify-start space-x-0.5">
                        <span>Order ID</span>
                        <div class="flex flex-col">
                            <span class="text-gray-400 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mb-2">
                                    <path fillRule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mt-1">
                                    <path fillRule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Email</span>
                        <div class="flex flex-col">
                            <span class="text-gray-400 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mb-2">
                                    <path fillRule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mt-1">
                                    <path fillRule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </a>
                    <a class="flex w-full justify-end ">
                        Phone
                        <div class="flex flex-col">
                            <span class="text-gray-400 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mb-2">
                                    <path fillRule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mt-1">
                                    <path fillRule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </a>
                    <a class="flex  w-full justify-end">
                        Order Date
                        <div class="flex flex-col">
                            <span class="text-gray-400 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mb-2">
                                    <path fillRule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mt-1">
                                    <path fillRule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </a>
                    <span>Total Amount</span>
                    <a class="flex  w-full justify-end">
                        Status
                        <div class="flex flex-col">
                            <span class="text-gray-400 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mb-2">
                                    <path fillRule="evenodd"
                                        d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                            <span class="text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5 -mt-1">
                                    <path fillRule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clipRule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </a>
                    <span>Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow ">
                <div class="flex flex-col space-y-2">
                    <div class="grid grid-cols-7 item-end text-end gap-2 font-medium"
                        onclick="showDetails('merch-order1')">
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
                            <button> #{{ Str::padLeft(5, 5, '0') }} </button>
                        </div>
                        <span>kimrop20@gmail.com</span>
                        <span>0723343392</span>
                        {{-- date make human readable --}}
                        <span>
                            {{ \Carbon\Carbon::now()->toFormattedDateString() }}
                        </span>
                        <span>KES. 10,000</span>
                        <span>Pending</span>
                        <span>View</span>
                    </div>
                    <div class="order-details" id="merch-order1">
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
                                <div class=" py-2 border divide-x items-center rounded gap-2 divide-y">
                                    <div class="space-x-2 text-center grid grid-cols-2 w-full items-center">
                                        <div class="space-x-2 flex text-left px-2 py-2">
                                            <img class="w-12 h-12 rounded" src="{{ asset('images/ph/merch2-ph.PNG') }}"
                                                alt="default image">
                                            <span class="font-semibold">
                                                Black T-Shirt with printing on it of design xyx
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-4 divide gap-2 text-center">
                                            <span>1</span>
                                            <span> kes.20000</span>
                                            <span>Black</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="space-x-2 text-center grid grid-cols-2 w-full items-center">
                                        <div class="space-x-2 flex text-left px-2 py-2">
                                            <img class="w-12 h-12 rounded" src="{{ asset('images/ph/merch2-ph.PNG') }}"
                                                alt="default image">
                                            <span class="font-semibold">
                                                Black T-Shirt with printing on it of design xyx
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-4 divide gap-2 text-center">
                                            <span>1</span>
                                            <span> kes.20000</span>
                                            <span>Black</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end flex flex-col  items-start py-5 px-5 w-full">
                                <h2><b>Customer Name: </b> kimutai Elphas</h2>
                                <h2><b>Customer Email :</b> 9k9jA@example.com</h2>
                                <h2><b>Customer Phone :</b> 0723343392</h2>
                                <h2><b>Customer Address :</b> 0723343392</h2>
                                <h2><b>Total Amount :</b> kes.20000</h2>
                                <h2><b>Status :</b> Pending</h2>
                                <div class="flex justify-end items-center w-full">
                                    <select class="border border-accent/20 bg-primary rounded-md px-5 py-1 "
                                        name="status" id="status">
                                        <option value="pending">Pending</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{ $merch_orders->links('pagination::tailwind') }}
        </div>
    </main>
@endsection
