<script src="https://cdn.tiny.cloud/1/a0pxndjlpo9rftzvaigzbxykpznjulfybfmkcls187ifrp1n/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<form action="{{ route($route) }}" method="POST" class="w-full" enctype="multipart/form-data">
    @csrf
    <textarea name="{{ $name }}" id="myeditorinstance" rows="10"
        class="border-2 border-accent/20  bg-primary rounded " placeholder="Description">
    {{ $content }}
    </textarea>
    <duv class="w-full flex py-5">
        <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white" type="submit">
            {{ $button_text ?? 'Update' }}
        </button>
    </duv>
</form>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'table lists',
        toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
    });
</script>
