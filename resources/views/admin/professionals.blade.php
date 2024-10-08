@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Professionals Management</h2>
            @include('forms.add-professional', ['id' => 'add-professional'])
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="grid grid-cols-2 md:grid-cols-3  lg:grid-cols-4 xl:grid-cols-5 px-4 gap-4 overflow-auto">
                @foreach ($professionals as $member)
                    <div
                        class="aspect-[5/6.5] relative border bg-white text-black col-span-1 items-center flex flex-col p-0 justify-between">
                        <button onclick="openEditDialog('edit-professional', {{ $member }})"
                            class="absolute top-2 right-2 flex items-center space-x-2 bg-accent shadow rounded text-white p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <a href="{{ route('admin.professional-events', $member->id) }}"
                            class="absolute top-2 left-2 flex items-center space-x-2 bg-accent shadow rounded text-white p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>

                        </a>
                        <div class="flex w-full flex-col items-center">
                            <div class="aspect-[5/5.5] border w-full justify-center items-center flex overflow-hidden ">
                                <img class="w-full h-full object-cover" src="{{ asset($member->image) }}" alt="" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-start items-center  w-full py-2">
                            <h3 class=" font-extrabold text-xl">{{ $member->name }}</h3>
                            <p class="text-lg">{{ $member->role }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $professionals->links('pagination::tailwind') }}
        </div>
    </main>
    @include('forms.edit.edit-professional', ['id' => 'edit-professional'])
@endsection
