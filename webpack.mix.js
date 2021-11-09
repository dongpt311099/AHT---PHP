const mix = require('laravel-mix');

mix.copy( 'resources/images', 'public/images'); // => copy cả folder vào public/images
mix.copy( 'resources/vendor/fontawesome', 'public/vendor/fontawesome');
mix.copy( 'resources/vendor/pe-icon', 'public/vendor/pe-icon');
mix.copy( 'resources/vendor/slick', 'public/vendor/slick');

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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.js('resources/js/app.js', 'public/js');

// mix.scripts([ //=> lệnh này gộp nhiều file js vào làm 1 file
//     'resources/vendor/slick/slick.min.js',
//     'public/js/app.js',
// ], 'public/js/app.js');
mix.js('resources/js/script.js', 'public/js'); // => copy file js vào public/js

mix.js('resources/js/cart.js', 'public/js');

mix.js('resources/js/login.js', 'public/js');

// mix.styles([ //=> gộp nhiều css vào thành 1 file
//     'resources/vendor/slick/slick.css',
//     'resources/vendor/slick/slick-theme.css',
//     'resources/vendor/fontawesome/css/fontawesome.min.css',
//     'resources/vendor/pe-icon/css/pe-icon-7-stroke.css',
// ],  'public/css/app.css');

mix.css('resources/___css/login.css', 'public/css');// => copy file css vào public/js

mix.css('resources/___css/productDetail.css', 'public/css');

mix.css('resources/___css/cart.css', 'public/css');

mix.css('resources/___css/checkout.css', 'public/css');

mix.less('resources/less/style.less','public/css');
