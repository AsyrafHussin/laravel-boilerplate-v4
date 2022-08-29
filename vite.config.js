import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import sassGlobImports from "vite-plugin-sass-glob-import";
import path from "path";

export default defineConfig({
    plugins: [
        sassGlobImports(),
        laravel(["resources/js/app.js"]),
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
});
