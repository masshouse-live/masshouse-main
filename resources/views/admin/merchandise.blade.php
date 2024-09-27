@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">Merchandise Management</h2>
            @include('forms.add-product', ['id' => 'add-product'])
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter Merchandise</h2>
                <div class="flex justify-between items-center">
                    <div class="flex py-3 gap-5">
                        <div class="flex flex-col space-y-2">
                            <label for="filter_category" class="text-textSecondary font-semibold">
                                Category
                            </label>
                            <select class="filter-input border border-accent/20 bg-primary rounded-md px-5 py-1 "
                                name="filter_category" id="filter_category">
                                < <option value="">-- All --</option>
                                    <option value="tshirts">T-Shirts</option>
                                    <option value="shirts">Shirts</option>
                                    <option value="pants">Pants</option>
                                    <option value="jackets">Jackets</option>
                                    <option value="sweaters">Sweaters</option>
                                    <option value="hoodies">Hoodies</option>
                                    <option value="sweatshirts">Sweatshirts</option>
                                    <option value="caps">Caps</option>
                                    <option value="sunglasses">Sunglasses</option>
                                    <option value="earphones">Earphones</option>
                                    <option value="headphones">Headphones</option>
                                    <option value="speakers">Speakers</option>
                                    <option value="watches">Watches</option>
                                    <option value="lighters">Lighters</option>
                                    <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-bold" for="filter_gender">
                                Gender
                            </label>
                            <select type="text" name="filter_gender" id="filter_gender" value=""
                                class="filter-input border border-accent/20 bg-primary rounded-md px-5 py-1 ">
                                <option value="">-- All --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="unisex">Unisex</option>
                            </select>
                        </div>
                        <form class="flex flex-col space-y-2">
                            <label for="filter_color" class="text-textSecondary font-semibold">
                                Color
                            </label>
                            <input type="search"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="filter_color" id="filter_color" />
                            @php
                                foreach ($_GET as $key => $value) {
                                    $key = htmlspecialchars($key);
                                    if ($key != 'filter_color') {
                                        $value = htmlspecialchars($value);
                                        echo "<input type='hidden' name='$key' value='$value'/>";
                                    }
                                }
                            @endphp
                            <button class="hidden"></button>
                        </form>
                        <form class="flex flex-col space-y-2">
                            <label for="filter_size" class="text-textSecondary font-semibold">
                                Size
                            </label>
                            <input type="search"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="filter_size" id="filter_size" />
                            @php
                                foreach ($_GET as $key => $value) {
                                    $key = htmlspecialchars($key);
                                    if ($key != 'filter_size') {
                                        $value = htmlspecialchars($value);
                                        echo "<input type='hidden' name='$key' value='$value'/>";
                                    }
                                }
                            @endphp
                            <button class="hidden"></button>
                        </form>
                        <form class="flex flex-col space-y-2">
                            <label for="search" class="text-textSecondary font-semibold">
                                Search
                            </label>
                            <input type="search"
                                class="filter-input border border-accent/20 bg-primary rounded-md px-2 py-1 dark:[color-scheme:dark]"
                                name="search" id="search" />
                            @php
                                foreach ($_GET as $key => $value) {
                                    $key = htmlspecialchars($key);
                                    if ($key != 'search') {
                                        $value = htmlspecialchars($value);
                                        echo "<input type='hidden' name='$key' value='$value'/>";
                                    }
                                }
                            @endphp
                            <button class="hidden"></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow ">
                <div class="grid grid-cols-7 item-end text-end gap-2 font-medium">
                    <a class="text-start flex justify-start space-x-0.5">
                        <span>Image / Name</span>

                    </a>
                    <a class="flex  w-full justify-end">
                        Category

                    </a>

                    <a class="flex  w-full justify-end">
                        <span>Price</span>

                    </a>
                    <a class="flex w-full justify-end ">
                        Stock

                    </a>
                    <a class="flex  w-full justify-end">
                        Sizes

                    </a>
                    <a class="flex  w-full justify-end">
                        Colors

                    </a>
                    <span>Gender | Action</span>
                </div>
            </div>
            <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow space-y-4">

                @foreach ($merchandise as $merch)
                    <div class="grid grid-cols-7 item-end text-end gap-2 font-medium">
                        <div class="flex  overflow-ellipsis overflow-hidde text-start">
                            <img src="{{ asset($merch->image) }}" alt="{{ $merch->title }}"
                                class="w-12 aspect-square object-cover rounded-md" />
                            <div class="ml-4">
                                <h3 class="text-sm line-clamp-2">{{ $merch->name }}</h3>
                            </div>
                        </div>

                        <div>
                            @if ($merch->category)
                                <span
                                    class="bg-accent shadow text-white rounded py-0.5 px-1 border border-accent/10">{{ $merch->category }}</span>
                            @endif
                        </div>

                        <span>KES.{{ $merch->price }}</span>
                        <span>{{ $merch->stock }}</span>
                        <div>
                            @foreach (explode(',', $merch->sizes) as $size)
                                <span
                                    class="shadow bg-secondary  rounded py-0.5 px-1 border border-accent/10">{{ $size }}</span>
                            @endforeach
                        </div>

                        <div>
                            @foreach (explode(',', $merch->colors) as $color)
                                <span
                                    class="shadow bg-secondary  rounded py-0.5 px-1 border border-accent/10 uppercase">{{ $color }}</span>
                            @endforeach
                        </div>
                        <div class="flex text-center justify-end items-start w-full ">
                            <span class="capitalize ">{{ $merch->gender }}</span>
                            <button class="text-accent  px-2 py-0.5"
                                onclick="openEditDialog('edit-product',{{ $merch }})"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $merchandise->links('pagination::tailwind') }}
        </div>
    </main>
    @include('forms.edit.edit-merchandise', ['id' => 'edit-product'])
    <script>
        (function() {
            tinymce.init({
                selector: 'textarea.tinymce', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'table lists',
                toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
            });
        })();
    </script>
@endsection
