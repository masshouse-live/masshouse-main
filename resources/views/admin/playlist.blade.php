@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Playlist & Media Management</h2>
            @include('forms.add-media', ['id' => 'add-media'])
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter Playlist & Media</h2>
                <div class="flex justify-between items-center">
                    <div class="flex py-3 gap-5">
                        <div class="flex flex-col space-y-2">
                            <label for="from_date" class="text-textSecondary font-semibold">
                                From Date
                            </label>
                            <input type="date" id="from_date"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="from_date" defaultValue={searchParams?.from_date} />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="to_date" class="text-textSecondary font-semibold">
                                To Date
                            </label>
                            <input type="date"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="to_date" id="to_date" defaultValue={searchParams?.to_date} />
                        </div>

                        <form class="flex flex-col space-y-2">
                            <label for="search" class="text-textSecondary font-semibold">
                                Search
                            </label>
                            <input type="search"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="search" id="search" defaultValue={searchParams?.search} />
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
                <div class="grid grid-cols-6 item-end text-end gap-2 font-medium">
                    <a class="text-start flex justify-start space-x-0.5">
                        <span>Title</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        Spotify URL

                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Youtube URL</span>

                    </a>
                    <a class="flex w-full justify-end ">
                        <span>Souncloud URL</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        <span>Applemusic URL</span>

                    </a>
                    <span>Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow space-y-4">
                {{-- loop through users --}}
                @foreach ($playlist as $media)
                    <div class="grid grid-cols-6 items-center text-end">
                        <div class="col-span-1 overflow-hidden text-left flex items-center">
                            <img src="{{ asset($media->image) }}" alt="image" class="h-10 w-10 mr-3 rounded">
                            {{ $media->title }}
                        </div>
                        <span class="col-span-1 overflow-hidden">
                            {{ $media->spotify_link }}
                        </span>
                        <span class="col-span-1 overflow-hidden">
                            {{ $media->youtube_link }}
                        </span>
                        <span class="col-span-1 overflow-hidden">
                            {{ $media->souncloud_link }}
                        </span>
                        <span class="col-span-1 overflow-hidden">
                            {{ $media->applemusic_link }}
                        </span>
                        <div class="col-span-1 ">
                            <button class="py-0.5 px-5  space-x-2 bg-accent shadow rounded text-white"
                                onclick="openEditDialog('edit-media',{{ $media }})">
                                Edit
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $playlist->links('pagination::tailwind') }}
        </div>
    </main>
    @include('forms.edit.edit-media', ['id' => 'edit-media'])
@endsection
