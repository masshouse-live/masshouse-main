@extends('includes.dialog')
@section('form')
    <div class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="{{ route('admin.add_product') }}" method="POST" enctype="multipart/form-data">
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add Merchandise </h2>
            </div>

            @csrf

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="name">
                    Name
                </label>
                <input type="text" name="name" id="name" value="" placeholder="Hoodie with Hooded Hoodie"
                    class="border-2 border-accent/20  bg-primary rounded ">
            </div>
            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="name">
                    Price (KES)
                </label>
                <input type="number" name="price" id="price" value="" placeholder="200"
                    class="border-2 border-accent/20  bg-primary rounded ">
            </div>
            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="stock">
                    Stock
                </label>
                <input type="number" name="stock" id="stock" value="" placeholder="200"
                    class="border-2 border-accent/20  bg-primary rounded ">
            </div>
            {{-- sizes --}}
            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="sizes">
                    Sizes
                </label>
                <input type="text" name="sizes" id="sizes" value="" placeholder="S, M, L, XL, XXL"
                    class="border-2 border-accent/20  bg-primary rounded ">
            </div>
            {{-- colors --}}
            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="colors">
                    Colors
                </label>
                <input type="text" name="colors" id="colors" value=""
                    placeholder="red, blue, green, yellow, black, white"
                    class="border-2 border-accent/20  bg-primary rounded ">
            </div>
            {{-- gender --}}
            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="gender">
                    Gender
                </label>
                <select type="text" name="gender" id="gender" value=""
                    class="border-2 border-accent/20  bg-primary rounded ">
                    <option disabled selected value="">-- Select Gender --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>
            </div>


            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="category">
                    Category
                </label>
                <select type="text" name="category" id="category" value=""
                    class="border-2 border-accent/20  bg-primary rounded ">
                    <option disabled selected value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="description">
                    Description
                </label>
                <textarea name="description" id="" rows="10" class="editor border-2 border-accent/20  bg-primary rounded "
                    placeholder="Description">
                    <ul class="list-unstyled list-inline description">
                        <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Regular Fit</li>
                        <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Ribbed Crew Neck
                        </li>
                        <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> 100% Cotton</li>
                        <li class="list-inline-item mx-2"><i class="fa-solid fa-check"></i> Embroided
                            MassHouse
                            logo
                        </li>

                    </ul>

                </textarea>
            </div>
            {{-- images --}}

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="image">
                    Image
                </label>
                <input type="file" name="image" id="image" value="" class=" bg-primary rounded ">
            </div>

            {{-- drag and drop extra images --}}

            <div class="flex flex-col space-y-2 px-4 py-2">
                <label class="font-bold" for="extra_images">
                    Extra Images
                </label>
            </div>
            <div id="extra_images" class="grid grid-cols-3 gap-4 px-4 items-center justify-center " id="extra_images">
                <div class="justify-center items-center h-full w-full flex flex-col  col-span-1" id="add_extra_image">

                    <button type="button" onclick="addExtraImage('add_extra_image','extra_images')"
                        class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                </div>
            </div>


            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Add Product </span>
                </button>
            </div>
        </form>
    </div>
@endsection
@section('buttons')
    <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-product')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Product</span></button>
@endsection
