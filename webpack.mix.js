const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts/**', 'public/fonts/font-awesome/', true)
    .sass('resources/sass/app.scss', 'public/css')
    .version();

mix.js('resources/admin/js/admin.js', 'public/js')
    .copy('node_modules/paper-dashboard-2/assets/fonts/**', 'public/fonts/nucleo/', true)
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js/', true)
    .copy('node_modules/datatables/media/js/jquery.dataTables.min.js', 'public/js/', true)
    .sass('resources/admin/sass/admin.scss', 'public/css')
    .version();
