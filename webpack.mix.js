const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const webpack = require('webpack');

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

mix.options({
    autoprefixer: {
        enabled: true,
        options: { remove: false }
    }
})
    .css('resources/css/dev-login.css', 'app.css', [require('postcss-import'), require('tailwindcss')])
    .setPublicPath('public')
    .version();
