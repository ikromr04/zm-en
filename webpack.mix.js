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
  .js('resources/scripts/pages/index.js', 'public/js/pages/index.min.js')
  .js('resources/scripts/pages/user.js', 'public/js/pages/user.min.js')
  .js('resources/scripts/pages/author/index.js', 'public/js/pages/author/index.min.js')
  .js('resources/scripts/pages/quotes/selected.js', 'public/js/pages/quotes/selected.min.js')
  .js('resources/scripts/pages/tags/index.js', 'public/js/pages/tags/index.min.js')
  .js('resources/scripts/pages/tags/selected.js', 'public/js/pages/tags/selected.min.js')
  .js('resources/scripts/auth/login.js', 'public/js/auth/login.min.js')
  .js('resources/scripts/pages/reset-password.js', 'public/js/pages/reset-password.min.js')

  .sass('resources/styles/index.scss', 'public/css/index.min.css')
  .sass('resources/styles/auth/login.scss', 'public/css/auth/login.min.css')

  .js('resources/scripts/admin/index.js', 'public/js/admin.min.js').react()
  .js('resources/scripts/favorites/index.js', 'public/js/favorites.min.js').react()
  .js('resources/scripts/favorites-modal/index.js', 'public/js/favorites-modal.min.js').react()

  .sourceMaps()
  .webpackConfig({
    devtool: 'source-map',
  })
  .options({
    processCssUrls: false,
  })
  .browserSync({
    proxy: 'http://127.0.0.1:8000',
  })
  .version();
