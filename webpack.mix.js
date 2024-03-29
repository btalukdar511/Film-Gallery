const {mix} = require('laravel-mix');

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

mix.js([
    //core
    'resources/assets/js/app.js',

    //additional
    'resources/assets/js/app/app.js'

], 'public/js/libs.js');


mix.sass('resources/assets/sass/app.scss', 'public/css/libs.css');
