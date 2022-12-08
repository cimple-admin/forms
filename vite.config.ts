import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: `assets/app.js`,
                chunkFileNames: `assets/[name].js`,
                assetFileNames: `assets/app.[ext]`
            }
        }
    }
})