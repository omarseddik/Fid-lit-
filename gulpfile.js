var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less([
        "AdminLTE.less",
        "skins/_all-skins.less"
    ], "public/assets/css");
});

elixir(function(mix) {
    mix.scripts([
        "jquery.js",
        "app.js"
    ]);
});