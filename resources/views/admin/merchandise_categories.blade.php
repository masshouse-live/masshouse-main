@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 pb-2">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Merchandise Categories</h2>
            @include('forms.add-category', ['id' => 'add-category'])
        </div>
        <div class="px-4 py-5">
            <div class="grid grid-cols-5 gap-4">
                @foreach ($merchandise_categories as $category)
                    <div class="aspect-[7/10] border flex flex-col bg-white relative">
                        <a href="{{ route('admin.highlight_category', $category->id) }}"
                            class="absolute
                            top-1 left-1 {{ $category->highlight ? 'text-orange-400' : 'text-black' }} bg-white p-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </a> <button onclick="openEditDialog('edit-category', {{ $category }})"
                            class="absolute
                            top-1 right-1 text-accent bg-white p-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>

                        </button>
                        <div class="aspect-square w-full bg-center bg-no-repeat bg-cover overflow-hidden"
                            style="background-image: url({{ asset($category->image) }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                            <div
                                class="aspect-square w-full h-full bg-gradient-to-b from-transparent via-black/20 to-black/40 justify-end flex flex-col ">
                                <div class="p-4">
                                    <h1 class="font-bold text-2xl ">{{ $category->subtitle }}</h1>
                                    <p class="text-5xl font-extrabold text-white ">{{ $category->name }}</p>
                                </div>

                            </div>
                        </div>
                        <div class=" text-black flex flex-col bottom-0 p-4">
                            <span
                                class="text-sm {{ \Str::length($category->tags) > 0 ? '' : 'h-5' }}">{{ $category->tags }}</span>
                            <span class="text-xl">FROM KES.{{ $category->price_from }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>
    </main>
    @include('forms.edit.edit-category', ['id' => 'edit-category'])
@endsection
