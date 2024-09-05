@extends('includes.dialog')

@section('form')
    @parent<div
        class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="/" method="POST" class="space-y-3 w-full ">
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add Event</h2>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="title">
                    Event Title
                </label>
                <input type="text" name="title" id="title" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Event Title" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="subtitle">
                    Event Sub Title
                </label>
                <input type="text" name="subtitle" id="subtitle" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Event Sub Title" />
            </div>
            <div class="grid grid-cols-3">
                <div class="col-span-2 flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="event_date">
                        Event Date
                    </label>
                    <input type="date" name="event_date" id="event_date" value=""
                        class="border-2 border-accent/20  bg-primary rounded " placeholder="Event Sub Title" />
                </div>
                <div class="col-span-1 flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="event_time">
                        Event Time
                    </label>
                    <input type="time" name="event_time" id="event_time" value=""
                        class="border-2 border-accent/20  bg-primary rounded " placeholder="Event Sub Title" />
                </div>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="tag">
                    Event Tag
                </label>
                <select type="text" name="tag" id="tag" class="border-2 border-accent/20  bg-primary rounded "
                    placeholder="Event Sub Title">
                    <option disabled selected value="">
                        Select Tag
                    </option>
                    <option>
                        daytime
                    </option>
                    <option>
                        nightlife
                    </option>
                    <option>
                        excusive
                    </option>
                </select>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="venue">
                    Event Venue
                </label>
                <select type="text" name="location" id="venue" value=""
                    class="border-2 border-accent/20  bg-primary rounded ">
                    <option value="" disabled selected>
                        Select Venue
                    </option>
                </select>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="cover_photo">
                    Cover Image
                </label>
                <input type="file" name="cover_photo" id="cover_photo" value="" class=" bg-primary rounded "
                    placeholder="Address" />
            </div>
            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Create Events </span>
                </button>
            </div>
        </form>
    </div>
@overwrite
@section('buttons')
    @parent<button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-event')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Event</span></button>
@overwrite
