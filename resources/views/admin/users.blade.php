@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Users Management</h2>
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter Users</h2>
                <div class="flex justify-between items-center">
                    <div class="flex py-3 gap-5">
                        <div class="flex flex-col space-y-2">
                            <label for="from_date" class="text-textSecondary font-semibold">
                                From Date
                            </label>
                            <input type="date" id="from_date"
                                class="border border-accent/20 bg-primary rounded-md px-2 py-1 filter-input dark:[color-scheme:dark]"
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
                            <select
                                class="filter-input border border-accent/20 bg-primary rounded-md px-5 py-1 dark:[color-scheme:dark]"
                                name="status" id="status">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <form class="flex flex-col space-y-2">

                            <label for="search" class="text-textSecondary font-semibold">
                                Search
                            </label>
                            <input type="search"
                                class="border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
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
                        <span>Name</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        ID Number

                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Email</span>

                    </a>
                    <a class="flex w-full justify-end ">
                        Phone

                    </a>
                    <a class="flex  w-full justify-end">
                        Registred Date

                    </a>
                    <a class="flex  w-full justify-end">
                        Status

                    </a>
                    <span>Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow space-y-4">
                {{-- loop through users --}}
                @foreach ($users as $user)
                    <div class="grid grid-cols-7 items-center text-end">
                        <a href="{{ route('admin.users.show', $user->id) }}"
                            class="text-start font-bold capitalize whitespace-nowrap ">
                            {{ $user->name }}
                        </a>
                        <span>{{ $user->id_number }}</span>
                        <span>{{ $user->email }}</span>
                        <span>{{ $user->phone }}</span>
                        <span>
                            {{ $user->created_at->format('Y-m-d') }}
                        </span>
                        <div class="flex justify-end items-center w-full">
                            {{-- active or inactive --}}
                            @if ($user->is_active == 1)
                                <div class="flex text-green-500 items-center space-x-3 rounded-md">
                                    <span>Active</span>
                                    <div class="h-2 w-2 bg-green-500 aspect-square rounded-full"></div>
                                </div>
                            @else
                                <div class="flex text-red-400 items-center space-x-3 rounded-md">
                                    <span>Inactive</span>
                                    <div class="h-2 w-2 bg-red-400 aspect-square rounded-full"></div>
                                </div>
                            @endif
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('admin.users.show', $user->id) }}"
                                class="bg-accent text-white px-3 py-1 rounded-md">
                                View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $users->links('pagination::tailwind') }}
        </div>
    </main>
@endsection
