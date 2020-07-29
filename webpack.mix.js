let mix = require('webpack-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.sass('resources/scss/main.scss', 'dist/css/custom-styles.min.css')
   .options({processCssUrls: false});

mix.js('resources/js/main.js', 'dist/js/custom-scripts.min.js');