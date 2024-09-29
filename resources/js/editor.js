import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".editor").forEach((element, index) => {
        ClassicEditor.create(element, {
            toolbar: [
                "undo",
                "redo",
                "|",
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "blockQuote",
                "insertTable",
            ],
        })
            .then((editor) => {
                window["editor" + element.id] = editor; // Store each editor instance uniquely
            })
            .catch((err) => {
                console.error(err.stack);
            });
    });
});
