const mix = require('laravel-mix');
const pkg = require('./package.json');

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

mix.setPublicPath('assets')
    // .setResourceRoot('../') // Turns assets paths in css relative to css file
    // .copyDirectory('node_modules/chart.js/dist', 'public/plugins/chartjs')
    // .copyDirectory('node_modules/toastr/build', 'public/plugins/toastr')
    // .copyDirectory('node_modules/select2/dist', 'public/plugins/select2')
    // .copyDirectory('node_modules/select2-theme-bootstrap4/dist', 'public/plugins/select2/css')
    // .copyDirectory('node_modules/@ckeditor/ckeditor5-build-classic/build', 'public/plugins/ckeditor')
    // .copyDirectory('node_modules/trix/dist', 'public/plugins/trix')
    .css([
        'src/css/bootstrap.css',
        'src/css/fontello.css',
        'src/css/app.css',
    ], 'assets/css/app.css')
    .js([
        'src/js/ZeroClipboard.min.js',
        'src/js/handlebars.js',
        'src/js/bootstrap.min.js',
        'src/js/typeahead.bundle.min.js',
        'src/js/jquery.raty.js',
        'src/js/jquery.toaster.js',
        'src/js/mousetrap.js',
        'src/js/app.js'
    ], 'assets/js/main.js')
    .extract()
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
    mix.version('assets/img');
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
