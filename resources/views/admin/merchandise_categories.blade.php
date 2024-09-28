@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 pb-2">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Merchandise Categories</h2>
            @include('forms.add-category', ['id' => 'add-category'])
        </div>
    </main>
@endsection
