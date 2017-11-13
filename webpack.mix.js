let mix = require('laravel-mix');

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
  /*** Javascripts files ***/
mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/themes/default/assets/js/jquery.js' )
	.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/themes/default/assets/js/bootstrap.js')
	.copy('node_modules/simplemde/dist/simplemde.min.js', 'public/themes/default/assets/js/simplemde.js')
	.copy('node_modules/moment/min/moment.min.js', 'public/themes/default/assets/js/moment.js')
	.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'public/themes/default/assets/js/datepicker.js');

mix.scripts([
	'public/themes/default/assets/js/jquery.js',
	'public/themes/default/assets/js/bootstrap.js',
	'public/themes/default/assets/js/simplemde.js',
	'public/themes/default/assets/js/moment.js',
	'public/themes/default/assets/js/datepicker.js'

	], 'public/themes/default/assets/js/all.js');



	/*** stylesheets ****/

mix.copy('node_modules/simplemde/dist/simplemde.min.css', 'public/themes/default/assets/sass')
	.copy('node_modules/eonasdan-bootstrap-datetimepicker/src/sass/_bootstrap-datetimepicker.scss','public/themes/default/assets/sass/datepicker.scss')
	.sass('public/themes/default/assets/sass/backend.scss', 'public/themes/default/assets/css')
	.sass('public/themes/default/assets/sass/frontend.scss', 'public/themes/default/assets/css/frontend.css');
   
