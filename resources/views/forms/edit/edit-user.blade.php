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
                <form action="{{ route('admin.user-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center py-4">
                        <h2 class="text-2xl font-bold">Edit User</h2>
                    </div>

                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="name">
                            Name
                        </label>
                        <input type="text" name="name" id="name"
                            class="edit-input border-2 border-accent/20  bg-primary rounded ">
                    </div>

                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="id_number">
                            Id Number
                        </label>
                        <input type="text" name="id_number" id="id_number"
                            class="edit-input border-2 border-accent/20  bg-primary rounded ">
                    </div>

                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="email">
                            Email
                        </label>
                        <input type="email" readonly name="email" id="email"
                            class="edit-input border-2 border-accent/20  bg-primary rounded ">
                    </div>

                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="phone">
                            Phone
                        </label>
                        <input type="text" name="phone" id="phone"
                            class="edit-input border-2 border-accent/20  bg-primary rounded ">
                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="profile_photo_path">
                            Profile Image
                        </label>
                        <input type="file" name="profile_photo_path" id="profile_photo_path" class="edit-input ">
                        <small id="file_profile_photo_path" class="text-accent"></small>
                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="is_admin">
                            <input type="checkbox" class="edit-input " name="is_admin" id="is_admin" class="mr-2">
                            Is Admin
                        </label>
                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="is_verified">
                            <input type="checkbox" class="edit-input " name="is_verified" id="is_verified"
                                class="mr-2">
                            Is Verified
                        </label>
                    </div>
                    <div class="flex flex-col space-y-2 px-4 py-2">
                        <label class="font-bold" for="address">
                            Address
                        </label>
                        <input type="text" name="address" id="address"
                            class="edit-input border-2 border-accent/20  bg-primary rounded ">
                    </div>

                    <div class="px-4 py-4">
                        <button type="submit"
                            class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
                            <span>Edit User </span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
