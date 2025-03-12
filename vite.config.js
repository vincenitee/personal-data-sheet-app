import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss',
                    'resources/css/app.css',
                    'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 8000, // Or any other free port
        hmr: {
            host: '192.168.10.98', // Replace with your actual IP
        },
    },
});
