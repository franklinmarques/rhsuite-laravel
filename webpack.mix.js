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

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);*/

// mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/assets/js/jquery.min.js');

mix.copyDirectory('resources/fonts', 'public/assets/fonts');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/assets/fonts/webfonts');

mix.sourceMaps(true, 'source-map')
    .sass('resources/scss/app.scss', 'public/assets/css/vendor.css');

mix.styles([
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
    'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
    'node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css',
    'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
    'node_modules/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css',
    'node_modules/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css',
    'node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css',
    'node_modules/datatables.net-searchpanes-bs4/css/searchPanes.bootstrap4.min.css',
], 'public/assets/css/datatables.css');

mix.styles([
    'resources/css/style.css',
    'resources/css/style-responsive.css',
    'resources/css/custom.css',
], 'public/assets/css/app.css');

mix.babel([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'node_modules/@fortawesome/fontawesome-free/js/all.js',
    'node_modules/bootbox/dist/bootbox.min.js',
    'node_modules/bootbox/dist/bootbox.locales.min.js',
    'node_modules/jquery.nicescroll/dist/jquery.nicescroll.js',
    'node_modules/jquery-slimscroll/jquery.slimscroll.js',
    'node_modules/jquery.scrollTo/jquery.scrollTo.js',
    'node_modules/dcjqaccordion/js/jquery.cookie.js',
    'node_modules/dcjqaccordion/js/jquery.hoverIntent.minified.js',
    'node_modules/dcjqaccordion/js/jquery.dcjqaccordion.2.7.js',
    'node_modules/datatables.net/js/jquery.dataTables.min.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
    'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
    'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
    'node_modules/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js',
    'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js',
    'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
    'node_modules/datatables.net-rowgroup-bs4/js/rowGroup.bootstrap4.min.js',
    'node_modules/datatables.net-rowreorder-bs4/js/rowReorder.bootstrap4.min.js',
    'node_modules/datatables.net-scroller-bs4/js/scroller.bootstrap4.min.js',
    'node_modules/datatables.net-searchpanes/js/dataTables.searchPanes.min.js',
    'node_modules/datatables.net-searchpanes-bs4/js/searchPanes.bootstrap4.min.js',
], 'public/assets/js/vendor.js').sourceMaps(true, 'source-map');

mix.copy('resources/json/datatables_pt-br.json', 'public/assets/json/datatables_pt-br.json');

mix.babel([
    'resources/js/ajax/ajax.custom.js',
    'resources/js/ajax/ajax.form.js',
    'resources/js/ajax/ajax.simple.js',
    'resources/js/ajax/ajax.upload.js',
    'resources/js/scripts.js',
], 'public/assets/js/app.js');
