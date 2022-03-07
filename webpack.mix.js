const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .autoload({
        'jquery': [ '$', 'jQuery' ],
    })
    .js( 'resources/scripts/app.js', 'public/js' )
    .sourceMaps()
    .sass( 'resources/sass/app.scss', 'public/css', {}, [
        require( 'autoprefixer' )
    ])
    .copy( 'resources/assets', 'public' );