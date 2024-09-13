@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Sponsors Management</h2>
            @include('forms.add-sponsor', ['id' => 'add-sponsor'])
        </div>
        <div class="flex w-full">
            <div class="grid grid-cols-5 p-4 gap-2 w-full" id="sortable">
                @foreach ($sponsors as $sponsor)
                    <div class="aspect-video h-40 border col-span-1 cursor-move relative" data-id="{{ $sponsor->id }}"
                        data-from="{{ $sponsor->rank }}">
                        <button onclick="openEditDialog('edit-sponsor', {{ $sponsor }})"
                            class="absolute top-2 right-1 bg-accent rounded shadoe text-white p-1 text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <img src="{{ asset($sponsor->logo) }}" class="aspect-video h-full object-cover cursor-move" />
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
@include('forms.edit.edit-sponsor', ['id' => 'edit-sponsor'])
