@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Delivery Policy</h2>
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="flex mx-auto max-w-screen-lg w-full">
                @include('forms.policy', [
                    'name' => 'delivery_policy',
                    'route' => 'admin.update-delivery-policy',
                    'button_text' => 'Update delivery Policy',
                    'content' => $delivery_policy,
                ])
            </div>
        </div>
    </main>
@endsection
