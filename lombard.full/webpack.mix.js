const mix = require('laravel-mix');
const path = require('path');
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

mix.js('resources/assets/admin/js/app.js', 'public/js')
    .js('resources/assets/site/js/site.js', 'public/js')
    .sass('resources/assets/site/sass/siteApp.scss', 'public/css')
    .sass('resources/assets/admin/sass/adminApp.scss', 'public/css')
    .browserSync({
        proxy: 'http://lombard.loc'
    })
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/js/')
            }
        }
    });
