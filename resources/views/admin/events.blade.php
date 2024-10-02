@extends('layouts.admin')
@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Events Management</h2>
            <div class="flex space-x-2">
                @include('forms.add-event', ['id' => 'add-event'])
            </div>
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter Events</h2>
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
                            <label for="filter_tag" class="text-textSecondary font-semibold">
                                Event Type
                            </label>
                            <select class="filter-input border border-accent/20 bg-primary rounded-md px-5 py-1 "
                                name="filter_tag" id="filter_tag">
                                <option value="">All</option>
                                <option value="daytime">daytime</option>
                                <option value="nightlife">nightlife</option>
                                <option value="excusive">excusive</option>
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
                    <a class="text-start flex justify-start space-x-0.5 col-span-2">
                        <span>Event Title</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        Event Date

                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Event Venue</span>

                    </a>
                    <a class="flex w-full justify-end ">
                        Event Tag

                    </a>
                    <a class="flex  w-full justify-end">
                        Created At

                    </a>
                    <span>Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow space-y-4">
                {{-- loop through users --}}
                @foreach ($events as $event)
                    <div class="grid grid-cols-7 items-center text-end">
                        <a href="{{ route('admin.users.show', $event->id) }}"
                            class="text-start font-bold capitalize whitespace-nowrap col-span-2 overflow-ellipsis line-clamp-1">
                            {{ $event->title }}
                        </a>
                        <span>{{ $event->date_time->format('Y-m-d H:i') }}
                        </span>
                        <span>{{ $event->venue->name }}</span>
                        <span class="text-accent font-bold capitalize whitespace-nowrap overflow-ellipsis line-clamp-1">
                            {{ $event->tag }}</span>
                        <span class="">
                            {{ $event->created_at->format('Y-m-d') }}
                        </span>
                        <div class="flex justify-end">
                            <button onclick="openEditDialog('edit-event', {{ $event }})"
                                class="bg-accent text-white px-3 py-1 rounded-md">
                                Edit
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $events->links('pagination::tailwind') }}
        </div>
    </main>
    @include('forms.edit.edit-event', ['id' => 'edit-event'])
@endsection
