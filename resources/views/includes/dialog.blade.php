<div>
    <div
        class="modal hidden z-50 fixed h-screen inset-0 bg-primary/50 backdrop-blur-sm justify-center items-center -top-0 pb-0">
        <div class="rounded shadow p-4 w-full h-full flex flex-col overflow-auto ">
            <div class="flex justify-between items-center ">
                <h2 class="text-2xl font-bold"></h2>
                <button class="text-2xl font-bold" onclick="closeDialog()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @yield('form')
        </div>
    </div>
    @yield('buttons')
</div>
