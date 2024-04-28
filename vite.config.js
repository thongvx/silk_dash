import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/main.js',
                'resources/js/sidebar.js',
                'resources/js/tabs-lifted.js',
                //dashboard
                'resources/js/chart/filechart.js',
                'resources/js/chart/charts.js',
                //upload
                'resources/js/upload/upload.js',
                'resources/js/upload/uploadFile.js',
                'resources/js/upload/transfer.js',
                //video
                'resources/js/jsVideo/datatable.js',
                'resources/js/jsVideo/box-video.js',
                //report
                'resources/js/report/report.js',
                //support
                'resources/css/vs2015.css',
                //setting
                'resources/js/setting/setting.js',
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
