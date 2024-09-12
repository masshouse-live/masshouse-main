<div class="flex space-x-2">
    <div id={{ $id }}
        class="modal hidden z-50 fixed h-screen inset-0 bg-primary/50 backdrop-blur-sm justify-center items-center -top-0 pb-0">
        <div class="rounded shadow p-4 w-full h-full flex flex-col overflow-auto ">
            <div class="flex justify-between items-center ">
                <h2 class="text-2xl font-bold"></h2>
                <button class="text-2xl font-bold" onclick="closeDialog('{{ $id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div
                class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
                <form action="{{ route('admin.edit_event') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-3 w-full ">
                    @csrf
                    <div class="flex justify-center items-center py-4">
                        <h2 class="text-2xl font-bold">Edit Event</h2>
                    </div>
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="title">
                            Event Title
                        </label>
                        <input type="text" name="title" id="title" value=""
                            class="edit-input border-2 border-accent/20  bg-primary rounded "
                            placeholder="Event Title" />
                    </div>
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="subtitle">
                            Event Sub Title
                        </label>
                        <input type="text" name="subtitle" id="subtitle" value=""
                            class="edit-input border-2 border-accent/20  bg-primary rounded "
                            placeholder="Event Sub Title" />
                    </div>
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="tickets_link">
                            Tickets Link
                        </label>
                        <input type="text" name="tickets_link" id="tickets_link" value=""
                            class="edit-input border-2 border-accent/20  bg-primary rounded "
                            placeholder="Tickets Link" />
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="col-span-2 flex flex-col space-y-2 px-4">
                            <label class="font-bold" for="event_date">
                                Event Date
                            </label>
                            <input type="date" name="event_date" id="event_date" value=""
                                class="edit-input border-2 border-accent/20  bg-primary rounded "
                                placeholder="Event Sub Title" />
                        </div>
                        <div class="col-span-1 flex flex-col space-y-2 px-4">
                            <label class="font-bold" for="event_time">
                                Event Time
                            </label>
                            <input type="time" name="event_time" id="event_time" value=""
                                class="edit-input border-2 border-accent/20  bg-primary rounded "
                                placeholder="Event Sub Title" />
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="tag">
                            Event Tag
                        </label>
                        <select type="text" name="tag" id="tag"
                            class="edit-input border-2 border-accent/20  bg-primary rounded "
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
                        <select type="text" name="event_venue" id="venue" value=""
                            class="edit-input border-2 border-accent/20  bg-primary rounded ">
                            <option value="" disabled selected>
                                Select Venue
                            </option>
                            @foreach ($event_venues as $venue)
                                <option value="{{ $venue->id }}">
                                    {{ $venue->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="banner">
                            Cover Image
                        </label>
                        <input type="file" name="banner" id="banner" value=""
                            class="edit-input bg-primary rounded " placeholder="Address" />
                        <small id="file_banner" class="text-accent"></small>
                    </div>
                    <div class="px-4 py-4">
                        <button type="submit"
                            class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                            <span>Update Events </span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
