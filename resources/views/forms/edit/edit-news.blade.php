<div class="flex space-x-2">
    <div id={{ $id }}
        class="modal hidden z-50 fixed h-screen inset-0 bg-primary/50 backdrop-blur-sm justify-center items-center -top-0 pb-0">
        <div class="rounded shadow p-4 w-full h-full flex flex-col overflow-auto ">
            <div class="flex justify-between items-center ">
                <h2 class="text-2xl font-bold"></h2>
                <button class="text-2xl font-bold" onclick="closeDialog('{{ $id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div
                class="h-full w-full mx-auto bg-primary max-w-screen-lg border-2 overflow-auto border-accent/20 rounded shadow">
                <form action="{{ route('admin.edit_news') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center py-4">
                        <h2 class="text-2xl font-bold">Add News & Blogs</h2>
                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="title">
                            Title
                        </label>
                        <input type="text" name="title" id="title" value=""
                            class="edit-input border-2 border-accent/20  bg-primary rounded " placeholder="Title" />

                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="category">
                            Content Type
                        </label>
                        <select type="text" name="category" id="category" value=""
                            class="edit-input border-2 border-accent/20  bg-primary rounded " placeholder="Tag">
                            <option disabled selected value="">-- Select Content Type --</option>
                            <option value="news">News</option>
                            <option value="blog">Blog</option>
                        </select>
                    </div>

                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="image">
                            Image
                        </label>
                        <input type="file" name="image" id="image" value=""
                            class="edit-input bg-primary rounded " placeholder="Image" />
                        <small id="file_image" class="text-accent"></small>

                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="description">
                            Description
                        </label>
                        <textarea name="description" id="myeditorinstanceedit" rows="10"
                            class="edit-input tinymce border-2 border-accent/20  bg-primary rounded " placeholder="Description"></textarea>
                    </div>

                    <div class="px-4 py-4">
                        <button type="submit"
                            class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                            <span>Update News </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
