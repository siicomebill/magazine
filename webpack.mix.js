const mix = require('laravel-mix');
require('laravel-mix-alias');

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
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
        ]
    })

mix.alias({
    '@': '/resources/js',
    '~': '/resources/js/Components',
    '#': '/resources/js/Components/PageComponents',
    'Jet': '/resources/js/Jetstream',
})

mix.options({
    terser: {
        sourceMap: true,
    }
})

mix.webpackConfig({
    cache: true,
    output: {
        chunkFilename: 'js/chunks/component.[name].js',
    }
})
