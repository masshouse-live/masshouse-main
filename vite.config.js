import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import ckeditor5 from "@ckeditor/vite-plugin-ckeditor5";
import path from "path";

export default defineConfig({
    plugins: [
        ckeditor5({
            theme: path.resolve(
                __dirname,
                "node_modules/@ckeditor/ckeditor5-build-classic"
            ),
        }),
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
        }),
    ],
});
