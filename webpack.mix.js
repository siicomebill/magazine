const mix = require('laravel-mix');
require('laravel-mix-alias');
const ChunkRenamePlugin = require('webpack-chunk-rename-plugin');


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
    .version()
    .js('resources/js/app.js', 'public/js')
    .extract(['vue'])
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
        ]
    })
    .alias({
        '@': '/resources/js',
        '~': '/resources/js/Components',
        '#': '/resources/js/Components/PageComponents',
        'Jet': '/resources/js/Jetstream',
        'Assets': '/resources/assets',
    })
    .webpackConfig({
        cache: true,
        output: {
            publicPath: '/',
            filename: '[name].js',
            chunkFilename: 'js/chunks/component.[name].js',
        },
        node: {
            fs: 'empty',
        },
        plugins: [
            new ChunkRenamePlugin({
                initialChunksWithEntry: true,
                '/js/vendor': '/js/vendor.js'
            }),
        ],
    })
