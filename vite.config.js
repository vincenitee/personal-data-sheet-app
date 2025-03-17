import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    // build: {
    //     outDir: 'public/build', // Ensure assets are placed in public/build
    //     emptyOutDir: true, // Clean old files before building
    //     manifest: true, // Generate manifest for Laravel
    // },
});
