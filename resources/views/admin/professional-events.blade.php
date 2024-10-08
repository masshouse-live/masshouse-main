@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">{{ $professional->name }} Events</h2>
            @include('forms.add-professional-event', ['id' => 'add-professional-event'])
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow ">
                <div class="grid grid-cols-4 item-end text-end gap-2 font-medium">
                    <a class="text-start flex justify-start space-x-0.5">
                        <span>Event Title</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        Event Date

                    </a>
                    <a class="flex w-full justify-end ">
                        Event Time
                    </a>
                    <span>Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow space-y-4">
                @foreach ($events as $event)
                    <div class="grid grid-cols-4 item-end text-end gap-2 font-medium">
                        <a class="text-start flex justify-start space-x-0.5">
                            <span>{{ $event->event->title }}</span>

                        </a>
                        <a class="flex  w-full justify-end">
                            {{ $event->event->date_time->format('M j Y') }}
                        </a>
                        <a class="flex w-full justify-end ">
                            {{ $event->event->date_time->format('h:i A') }}
                        </a>
                        <form method="POST" action="{{ route('admin.delete-professional-event', $event->id) }}"
                            class="flex  w-full justify-end">
                            @csrf
                            <button class="text-sm text-accent" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            {{ $events->links('pagination::tailwind') }}

        </div>
    </main>
@endsection
