@extends('includes.dialog')
@section('form')
    <div class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="{{ route('admin.create-professional-event', $professional->id) }}" method="POST"
            enctype="multipart/form-data">
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add New Event Featuring {{ $professional->name }} </h2>
            </div>
            @csrf
            <div class="flex flex-col space-y-2 px-4 py-2">
                <input type="hidden" name="id" id="id" value="{{ $professional->id }}" <label class="font-bold"
                    for="event">
                Event
                </label>
                <select type="text" name="event_id" id="event" value=""
                    class="border-2 border-accent/20  bg-primary rounded ">
                    <option disabled selected value="">-- Select Event --</option>
                    @foreach ($all_events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }} - {{ $event->date_time->format('M j Y') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Create Event </span>
                </button>
            </div>
        </form>
    </div>
@endsection
@section('buttons')
    <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-professional-event')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Event</span></button>
@endsection
