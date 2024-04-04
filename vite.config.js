import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import dotenv from 'dotenv';
dotenv.config();

const host = process.env.APP_DOMAIN;
 
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/custom.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        hmr: { host },
    }
});
