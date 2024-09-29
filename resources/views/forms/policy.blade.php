<form action="{{ route($route) }}" method="POST" class="w-full" enctype="multipart/form-data">
    @csrf
    <textarea name="{{ $name }}" rows="10" class="editor border-2 border-accent/20  bg-primary rounded "
        placeholder="Description">
    {{ $content }}
    </textarea>
    <duv class="w-full flex py-5">
        <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white" type="submit">
            {{ $button_text ?? 'Update' }}
        </button>
    </duv>
</form>
