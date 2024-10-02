@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Events Venues</h2>
            @include('forms.add-event-venue', ['id' => 'add-venue'])

        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto w-full">
            <div class="flex flex-col mx-auto  w-full ">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 w-full gap-4">
                    @foreach ($event_venues as $event_venue)
                        <div class="aspect-[5/7] w-full border bg-cover bg-center bg-no-repeat flex flex-col justify-center items-center px-4 relative"
                            style="background-image: url({{ asset($event_venue->cover_photo) }});">
                            <button class="absolute top-1 right-1 bg-accent/80 p-1 rounded "
                                onclick="openEditDialog('edit-venue',{{ $event_venue }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <span class="w-full py-2 px-4 bg-white/80 border text-center text-black">
                                {{ $event_venue->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @include('forms.edit.edit-event-venue', ['id' => 'edit-venue'])
@endsection
