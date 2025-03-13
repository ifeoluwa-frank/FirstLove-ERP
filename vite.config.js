import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/main.css",
                "resources/js/chart.sample.js",
                "resources/js/chart.sample.min.js",
                "resources/js/main.js",
                "resources/js/main.min.js",
            ],
            refresh: true,
        }),
    ],
});
