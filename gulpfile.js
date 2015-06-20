var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
var paths = {
    'bower': './bower_components/',
    'bootstrap': './bower_components/bootstrap-sass-official/assets/'
};

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix
        .sass(
            [
                "frontend/style.scss",
            ], 'public/css/',
            {includePaths: [paths.bootstrap + 'stylesheets/',
                paths.bower + 'bourbon/app/assets/stylesheets/',
                paths.bower + 'fontawesome/scss/']}
        )
        .sass(
            [
                "backend/backend.scss"
            ], 'public/css/',
            {includePaths: [paths.bower + 'uikit/scss/',
                paths.bower + 'fontawesome/scss/']}
        )
        .copy(
            paths.bootstrap + 'fonts/bootstrap/', 'public/fonts/bootstrap/',
            paths.bower + 'modernizr/modernizr.js', 'public/js/modernizr.js',
            paths.bower + 'fontawesome/fonts/', 'public/fonts/awesome/')
        .scripts(
        [
            paths.bower + "jquery-1.9.1.min/index.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            "/resources/assets/js/custom.js"
        ], 'public/js/app.js', './')
        .scripts(
        [
            paths.bower + "jquery-1.9.1.min/index.js",
            paths.bower + "uikit/js/uikit.min.js",
            '/resources/js/select2.min.js'
        ], 'public/js/back.js', './');

    mix.styles(
        [
            'select2.min.css'
        ]
    );
});