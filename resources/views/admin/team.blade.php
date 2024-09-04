@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Team Management</h2>
            <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg><span>New Member</span></button>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3  lg:grid-cols-4 xl:grid-cols-5 px-4 gap-4 overflow-auto">
            <div class="aspect-[5/6] relative border col-span-1 items-center flex flex-col justify-between">
                <button class="absolute top-2 right-2 flex items-center space-x-2 bg-accent shadow rounded text-white p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </button>
                <div class="flex  flex-col items-center">
                    <div class="aspect-[5/5.5] border w-full justify-center items-center flex overflow-hidden ">
                        <img class="w-full h-full object-cover"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                            alt="" />

                    </div>
                </div>
                <div class="flex flex-col justify-start items-center  w-full ">
                    <h3 class=" font-extrabold text-xl">John Doe</h3>
                    <p class="text-lg">Designer</p>
                </div>
            </div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
            <div class="aspect-square border col-span-1"></div>
        </div>
    </main>
@endsection
