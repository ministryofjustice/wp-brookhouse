const mix_ = require('laravel-mix');

var _asset = './assets/';

mix_.setPublicPath('./dist')
    .js([
        _asset + 'js/navigation.js',
        _asset + 'js/skip-link-focus-fix.js',
        _asset + 'js/document-listing.js',
        _asset + 'js/evidence.js'
    ], 'js/main.min.js')
    .js(_asset + 'js/IE8.js', 'dist/js/ie8.js')
    .js([
        _asset + 'js/evidence-sort.js',
        _asset + 'js/field_date.js',
    ], 'dist/js/custom-admin.min.js')
    .js(_asset + 'js/combodate.js', 'dist/js/combodate.min.js')
    .sass(_asset + 'scss/error-pages/404.scss', 'dist/css/404.css')
    .sass(_asset + 'scss/error-pages/error-page.scss', 'dist/css/error-page.css')
    .copy(_asset + 'js/*.min.js', 'dist/js/')
    .copy(_asset + 'js/restrict-embed-blocks.js', 'dist/js/')
    .sass(_asset + 'scss/style.scss',  'dist/css/main.min.css')
    .sass(_asset + 'scss/style-gutenburg.scss', 'css/style-gutenburg.min.css')
    .styles(_asset + 'css/custom-admin.css', 'dist/css/custom-admin.min.css')
    .styles(_asset + 'css/jquery-ui.css', 'dist/css/jquery-ui.min.css')
    .copy(_asset + 'img/*', 'dist/img/');

if (mix_.inProduction()) {
    mix_.version();
} else {
    mix_.sourceMaps();
}
