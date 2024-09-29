@extends('includes.dialog')

@section('form')
    <div class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="{{ route('admin.add_media') }}" method="POST" enctype="multipart/form-data">
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add Media</h2>
            </div>
            @csrf
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="title">
                    Title
                </label>
                <input type="text" name="title" id="title" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Title" />
            </div>

            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="image">
                    Cover Image
                </label>
                <input type="file" name="image" id="image" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Image" />
            </div>

            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="spotify_link">
                    Spotify Link
                </label>
                <input type="text" name="spotify_link" id="spotify_link" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Spotify Link" />

            </div>

            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="youtube_link">
                    Youtube Link
                </label>
                <input type="text" name="youtube_link" id="youtube_link" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Youtube Link" />

            </div>

            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="souncloud_link">
                    Souncloud Link
                </label>
                <input type="text" name="souncloud_link" id="souncloud_link" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Souncloud Link" />

            </div>

            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="applemusic_link">
                    Apple Music Link
                </label>
                <input type="text" name="applemusic_link" id="applemusic_link" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Apple Music Link" />
            </div>
            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Create Media </span>
                </button>
            </div>
        </form>
    </div>
@endsection
@section('buttons')
    <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-media')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Media</span></button>
@endsection
