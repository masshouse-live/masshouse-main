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
                    <div class="aspect-video h-40 border col-span-1 cursor-move" data-id="{{ $sponsor->id }}"
                        data-from="{{ $sponsor->rank }}">
                        <img src="{{ asset($sponsor->logo) }}" class="aspect-video h-full object-cover cursor-move" />
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
