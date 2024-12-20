const mix = require('laravel-mix');

mix.js('resources/js/index.js', 'public/js')
   .sass('resources/sass/styles.scss', 'public/css')
   .copyDirectory('resources/fonts', 'public/fonts')
   .setResourceRoot('/')
   .version();
