@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Tables Management</h2>
            @include('forms.add-table', ['id' => 'add-table'])
        </div>
        <div class="flex w-full px-4">
            <div class="grid xl:grid-cols-5 2xl:grid-cols-6 w-full gap-5">
                @foreach ($tables as $table)
                    <a href="{{ route('admin.table-details', $table->id) }}"
                        class="aspect-video w-full border col-span-1  relative flex items-center justify-center"
                        data-id="{{ $table->id }}" data-from="{{ $table->rank }}">
                        <div class="flex flex-wrap justify-center gap-y-3 w-full px-5">
                            @for ($i = 0; $i < $table->number_seats; $i++)
                                <div class="flex items-center justify-center w-1/4">
                                    <!-- Each item takes up 1/4th of the container width -->
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        {{ $i + 1 }}
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </main>
@endsection
