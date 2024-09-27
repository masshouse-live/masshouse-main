@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 pb-2">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Contact & Support Management</h2>
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter News & Blogs</h2>
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
                    <a class="text-start flex justify-start space-x-0.5 col-span-2">
                        <span>Subject</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        Category

                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Client Email</span>

                    </a>
                    <a class="flex w-full justify-end ">
                        Client Phone

                    </a>
                    <a class="flex w-full justify-end ">
                        Client Name

                    </a>

                    <a class="flex  w-full justify-end">
                        Contact Date

                    </a>

                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow gap-2 flex flex-col">
                @foreach ($contacts as $contact)
                    <a href="{{ route('admin.contact-details', $contact->id) }}"
                        class="grid grid-cols-7 item-end text-end gap-2 font-medium">
                        <span class="line-clamp-2 text-left col-span-2">{{ $contact->subject }}</span>
                        <span>{{ $contact->category }}</span>
                        <span>{{ $contact->email }}</span>
                        <span>{{ $contact->phone }}</span>
                        <span>{{ $contact->name }}</span>
                        <span>{{ $contact->created_at->diffForHumans() }}</span>
                    </a>
                @endforeach

            </div>
            {{ $contacts->links('pagination::tailwind') }}
        </div>
    </main>
@endsection
