@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">


        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Sponsors Management</h2>
            <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span>New Sponsor</span>
            </button>
        </div>
        <div class="flex w-full">
            <div class="grid grid-cols-5 p-4 gap-2 w-full" id="sortable">
                <div class="aspect-video h-40 border col-span-1">
                    <img src="https://www.safaricom.co.ke/images/safaricom-logo-green.png"
                        class="aspect-video h-full object-contain" />
                </div>
                <div class="aspect-video h-40 border col-span-1">
                    <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        class="aspect-video h-full object-contain" />
                </div>
                <div class="aspect-video h-40 border col-span-1">3</div>
                <div class="aspect-video h-40 border col-span-1">4</div>
                <div class="aspect-video h-40 border col-span-1">5</div>
                <div class="aspect-video h-40 border col-span-1">6</div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
                <div class="aspect-video h-40 border col-span-1"></div>
            </div>
        </div>
    </main>
@endsection
