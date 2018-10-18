const mix = require('laravel-mix');
// const { mix } = require('laravel-mix')

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

var adminScripts = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/paper-dashboard-2/assets/js/core/jquery.min.js',
    'node_modules/paper-dashboard-2/assets/js/plugins/perfect-scrollbar.jquery.min.js',
    'node_modules/paper-dashboard-2/assets/js/plugins/chartjs.min.js',
    'node_modules/paper-dashboard-2/assets/js/plugins/bootstrap-notify.js',
    'node_modules/paper-dashboard-2/assets/js/paper-dashboard.min.js',
    'node_modules/pickadate/lib/picker.js',
    'node_modules/pickadate/lib/picker.time.js',
    'node_modules/pickadate/lib/picker.date.js',
    'public/js/admin.js',
];

mix.webpackConfig({
    resolve: {
        alias: { 'picker': 'pickadate/lib/picker' }
    },
}).js('resources/js/app.js', 'public/js')
    .js('resources/admin/js/admin.js', 'public/js')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts/**', 'public/fonts/font-awesome/', true)
    .copy('node_modules/paper-dashboard-2/assets/fonts/**', 'public/fonts/nucleo/', true)
    .copy('node_modules/datatables/media/js/jquery.dataTables.min.js', 'public/js/', true)
    .copy('node_modules/ckeditor/config.js', 'public/js/ckeditor/config.js')
    .copy('node_modules/ckeditor/styles.js', 'public/js/ckeditor/styles.js')
    .copy('node_modules/ckeditor/contents.css', 'public/js/ckeditor/contents.css')
    .copyDirectory('node_modules/ckeditor/skins', 'public/js/ckeditor/skins')
    .copyDirectory('node_modules/ckeditor/lang', 'public/js/ckeditor/lang')
    .copyDirectory('node_modules/ckeditor/plugins', 'public/js/ckeditor/plugins')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/admin/sass/admin.scss', 'public/css')
    .scripts(adminScripts, 'public/js/admin.js')
    .version();




