@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Site Settings</h2>
        </div>

        <div class="flex flex-col px-4 space-y-4 overflow-auto max-w-screen-md mx-auto w-full bg-primary py-10 rounded-xl">
            <form action="{{ route('admin.update_settings') }}" method="POST" enctype="multipart/form-data"
                class="space-y-3 w-full ">
                @csrf
                <div class="flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="name">
                        Name
                    </label>
                    <input type="text" name="name" id="name" value="{{ $settings->name ?? '' }}"
                        class="border-2 border-accent/20  bg-primary rounded " placeholder="Name" />
                </div>
                <div class="flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="logo">
                        Logo
                    </label>
                    <input type="file" name="logo" id="logo" value="" class="bg-primary rounded "
                        placeholder="Logo" />
                    <span class="text-xs text-accent">{{ $settings->logo ?? '' }}</span>
                </div>
                <div class="flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="contact_email">
                        Contact Email
                    </label>
                    <input type="email" name="contact_email" id="contact_email"
                        value="{{ $settings->contact_email ?? '' }}" class="border-2 border-accent/20  bg-primary rounded "
                        placeholder="Contact Email" />
                </div>
                <div class="flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="contact_phone">
                        Contact Phone
                    </label>
                    <input type="text" name="contact_phone" id="contact_phone"
                        value="{{ $settings->contact_phone ?? '' }}" class="border-2 border-accent/20  bg-primary rounded "
                        placeholder="Contact Phone" />
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="reservation_from">
                            Reservation From
                        </label>
                        <input type="time" name="reservation_from" id="reservation_from"
                            value="{{ $settings->reservation_from ?? '' }}:00"
                            class="border-2 border-accent/20  bg-primary rounded " placeholder="Reservation From " />
                    </div>
                    <div class="flex flex-col space-y-2 px-4">
                        <label class="font-bold" for="reservation_to">
                            Reservation To
                        </label>
                        <input type="time" name="reservation_to" id="reservation_to"
                            value="{{ $settings->reservation_to ?? '' }}:59"
                            class="border-2 border-accent/20  bg-primary rounded " placeholder="Reservation To" />
                        <small>Will always end at :59th min of selected hour</small>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="contact_address">
                        Contact Address
                    </label>
                    <input type="text" name="contact_address" id="contact_address"
                        value="{{ $settings->contact_address ?? '' }}"
                        class="border-2 border-accent/20  bg-primary rounded " placeholder="Contact Address" />
                </div>
                <div class="flex flex-col space-y-2 px-4">
                    <label class="font-bold" for="menu_path">
                        Menu pdf
                    </label>
                    <input type="file" name="menu_path" id="menu_path" class="bg-primary rounded " placeholder="Menu pdf"
                        accept="application/pdf" />
                    <span class="text-xs text-accent">{{ $settings->menu_path ?? '' }}</span>
                </div>

                <div class="px-4 py-4">
                    <button type="submit"
                        class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                        <span>Update Settings </span>
                    </button>
                </div>

            </form>
        </div>
    </main>
@endsection
