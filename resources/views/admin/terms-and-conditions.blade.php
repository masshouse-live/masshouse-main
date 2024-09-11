@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Terms and Conditions</h2>
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="flex mx-auto max-w-screen-lg w-full">
                @include('forms.policy', [
                    'name' => 'terms_and_conditions',
                    'route' => 'admin.update-terms-and-conditions',
                    'button_text' => 'Update Terms and Conditions',
                    'content' => $terms_and_conditions,
                ])
            </div>
        </div>
    </main>
@endsection
