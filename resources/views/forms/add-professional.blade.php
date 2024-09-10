@extends('includes.dialog')

@section('form')
    <div class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="{{ route('admin.add_professional') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add Professional</h2>
            </div>

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="name">
                    Name
                </label>
                <input type="text" name="name" id="name" value=""
                    class="border-2 border-accent/20  bg-primary rounded ">
            </div>

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="role">
                    Profession
                </label>
                <select type="text" name="role" id="role" value=""
                    class="border-2 border-accent/20  bg-primary rounded ">
                    <option value="" disabled selected>
                        Select Profession
                    </option>
                    <option>
                        Dj's
                    </option>
                    <option>
                        Performers
                    </option>
                    <option>
                        MCs
                    </option>
                </select>
            </div>
            {{-- image --}}

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="image">
                    Image
                </label>
                <input type="file" name="image" id="image" value="" class=" bg-primary rounded ">
            </div>

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="description">
                    Description
                </label>
                <textarea name="description" id="description" cols="10" rows="10"
                    class="border-2 border-accent/20  bg-primary rounded"></textarea>
            </div>

            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Add Professional </span>
                </button>
            </div>

        </form>
    </div>
@endsection
@section('buttons')
    <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-professional')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Professional</span></button>
@endsection
