@extends('includes.dialog')

@section('form')
    @parent<div
        class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
        <form action="{{ route('admin.create_category') }}" method="POST" enctype="multipart/form-data"
            class="space-y-3 w-full ">
            @csrf
            <div class="flex justify-center items-center py-4">
                <h2 class="text-2xl font-bold">Add Category</h2>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="name">
                    Category Name
                </label>
                <input type="text" name="name" id="name" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Category Name" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="subtitle">
                    Sub Title
                </label>
                <input type="text" name="subtitle" id="subtitle" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Category Name" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="type">
                    Category Type
                </label>
                <select type="text" name="type" id="type" value="" required
                    class=" border-2 border-accent/20  bg-primary rounded ">
                    <option>-- Select Type --</option>
                    <option value="alpha">Alpha</option>
                    <option value="">Normal</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="price_from">
                    From Price
                </label>
                <input type="number" name="price_from" id="price_from" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="From Price" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="tags">
                    Category Tags
                </label>
                <input type="text" name="tags" id="tags" value=""
                    class="border-2 border-accent/20  bg-primary rounded " placeholder="Tags. ie XL, M, S" />
            </div>
            <div class="flex flex-col space-y-2 px-4">
                <label class="font-bold" for="image">
                    Category Image
                </label>
                <input type="file" name="image" id="image" value="" class=" bg-primary rounded " />
            </div>
            <div class="px-4 py-4">
                <button type="submit" class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                    <span>Create Category </span>
                </button>
            </div>
        </form>
    </div>
@overwrite
@section('buttons')
    @parent<button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white"
        onclick="openDialog('add-category')">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg><span>New Category</span></button>
@overwrite
