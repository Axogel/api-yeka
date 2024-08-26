import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/css/app.css',
      ],

      refresh: true,
    }),
    vue(), ],
  esbuild: {
    loader: 'jsx',
    target: 'es2020',
  },
});