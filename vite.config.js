import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Chart from 'chart.js/auto';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/style.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
