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

mix
    /* JS */
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/sortable.js', 'public/js')
    .js('resources/js/deleteRestorePicture.js', 'public/js')
    .js('resources/js/sortablePictures.js', 'public/js')
    .js('resources/js/preloadPicture.js', 'public/js')
    .js('resources/js/axios.js', 'public/js')
    .js('resources/js/helpers.js', 'public/js')
    .js('resources/js/modals_form_module.js', 'public/js')
    .js('resources/js/modal_question.js', 'public/js')

    /* CSS */
    // .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/app_site.scss', 'public/css');
