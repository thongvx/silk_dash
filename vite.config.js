import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/eplay.js',
                'resources/js/download.js',
                'resources/js/upload/uploadFile.js',
                'resources/js/landing.js',
                'resources/css/vs2015.css',
                'resources/js/admin/admin.js',
                'resources/js/dropzone/app-dropzone.js',
                'resources/css/dropzone/dropzone.css',
                'resources/js/resumable/app-resumable.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: [
            {
                // this is required for the SCSS modules
                find: /^~(.*)$/,
                replacement: '$1',
            },
        ],
    },
});
