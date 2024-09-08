@extends('includes.dialog')

@section('form')
    @parent<div
        class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="{{ route('admin.create_event_venue') }}" method="POST" enctype="multipart/form-data"
            class="space-y-3 w-full ">
            @csrf
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add Events Venue</h2>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="location">
                    Location / City
                </label>
                <input type="text" name="location" id="location" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Location / City" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="address">
                    Address
                </label>
                <input type="text" name="address" id="address" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Address" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="cover_photo">
                    Cover Image
                </label>
                <input type="file" name="cover_photo" id="cover_photo" value="" class=" bg-primary rounded "
                    placeholder="Address" />
            </div>
            <div class="w-full flex flex-col space-y-2 py-2">
                <h6 class="font-bold px-4">Location Images</h6>
                <p class="px-4">Please make sure the image you select fits well in the rectangles.</p>
                <div class="space-x-2 px-4 w-full grid grid-cols-9 mt-5">
                    <div class="col-span-4 gap-2 flex flex-col">
                        <label
                            class="drag-drop aspect-[4/1.8] w-full bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed">
                            <h6 class="font-bold">Select or Drop Image</h6>
                            <input type="file" name="image1" id="image1" value="" class="hidden" />
                            <div class="overlay"></div>
                        </label>
                        <label
                            class="drag-drop aspect-[4/2.5] w-full bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed">
                            <h6 class="font-bold">Select or Drop Image</h6>
                            <input type="file" name="image2" id="image2" value="" class="hidden" />
                            <div class="overlay"></div>
                        </label>
                    </div>
                    <div class="col-span-5 gap-2 flex flex-col">
                        <div class="grid grid-cols-7 gap-2">
                            <label
                                class="drag-drop h-60 bg-secondary py-2 col-span-4 border-2 text-center justify-center items-center flex border-dashed">
                                <h6 class="font-bold">Select or Drop Image</h6>

                                <input type="file" name="image3" id="image3" value="" class="hidden" />
                                <div class="overlay"></div>
                            </label>
                            <label
                                class="drag-drop h-full w-full bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed col-span-3">
                                <h6 class="font-bold">Select or Drop Image</h6>

                                <input type="file" name="image4" id="image4" value="" class="hidden" />
                                <div class="overlay"></div>
                            </label>
                        </div>
                        <label
                            class="drag-drop aspect-[4/1.71] w-full bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed">
                            <h6 class="font-bold">Select or Drop Image</h6>

                            <input type="file" name="image5" id="image5" value="" class="hidden" />
                            <div class="overlay"></div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Create Events Venue</span>
                </button>
            </div>
        </form>
    </div>
@stop
@section('buttons')
    @parent<button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-venue')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Venue
        </span></button>
@stop
