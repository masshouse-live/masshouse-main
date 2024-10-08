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
                        <div class="text-start font-bold capitalize whitespace-nowrap flex items-center gap-1">
                            @if ($user->profile_photo_path)
                                <img src="{{ asset($user->profile_photo_path) }}" alt=""
                                    class="w-10 h-10 object-cover object-center overflow-hidden rounded-full">
                            @else
                                <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center"></div>
                            @endif
                            {{ $user->name }}

                        </div>
                        <span>{{ $user->id_number }}</span>
                        <span>{{ $user->email }}</span>
                        <span>{{ $user->phone }}</span>
                        <span>
                            {{ $user->created_at->format('Y-m-d') }}
                        </span>
                        <div class="flex justify-end items-center w-full">
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
                            <button onclick="openEditDialog('edit-user', {{ $user }})"
                                class="bg-accent text-white px-1 py-1 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <form action="{{ route('admin.user-delete', $user->id) }}" method="POST" class="px-2">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-1 py-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $users->links('pagination::tailwind') }}
        </div>
    </main>
    @include('forms.edit.edit-user', ['id' => 'edit-user'])
@endsection
