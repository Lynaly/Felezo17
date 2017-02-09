const { mix } = require('laravel-mix');


mix
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .js('resources/assets/js/app.js', 'public/js')
    .version();