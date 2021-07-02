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
  .sass('resources/sass/app.scss', 'public/css')
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/product-order.js', 'public/js')
  .js('resources/js/archive-order.js', 'public/js')
  .js('resources/js/cart-quantity.js', 'public/js')
  .js('resources/js/cart.js', 'public/js')
  .js('resources/js/login.js', 'public/js')
  .js('resources/js/sortable.js', 'public/js')
  .js('resources/js/editXml.js', 'public/js')
  .js('resources/js/editBanner.js', 'public/js');
