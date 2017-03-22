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

	// Login Styles and Scripts
		mix.styles([
			'jquery-ui.min.css',
			'bootstrap.min.css',
			'font-awesome.min.css',
			'animate.min.css',
			'style.min.css',
			'style-responsive.min.css',
			'default.css',
		], 'public/css/login.css');

		mix.scripts([
			'pace.min.js',
			'jquery-1.9.1.min.js',
			'jquery-migrate-1.1.0.min.js',
			'jquery-ui.min.js',
			'bootstrap.min.js',
			'jquery.hashchange.min.js',
			'jquery.slimscroll.min.js',
			'jquery.cookie.js',
			'login-v2.demo.min.js',
			'apps.min.js'
		], 'public/js/login.js');


	// Admin Styles and Scripts
		mix.styles([
			'jquery-ui.min.css',
			'bootstrap.min.css',
			'font-awesome.min.css',
			'animate.min.css',
			'style.min.css',
			'style-responsive.min.css',
			'datepicker.css',
			'datepicker3.css',
			'jquery.gritter.css',
			'bootstrap-timepicker.min.css',
			'bootstrap-combobox.css',
			'bootstrap-select.min.css',
			'bootstrap-tagsinput.css',
			'jquery.tagit.css',
			'jquery.bootgrid.min.css',
			'select2.min.css',
			'bootstrap-datetimepicker.min.css',

			'sweet-alert.css',
			'custom.css'
		], 'public/css/app.css');

		mix.scripts([
			'pace.min.js',
			'jquery-1.9.1.min.js',
			'jquery-migrate-1.1.0.min.js',
			'jquery-ui.min.js',
			'bootstrap.min.js',
			'jquery.slimscroll.min.js',
			'jquery.cookie.js',

			'jquery.hashchange.min.js',
			'jquery.gritter.js',
			'jquery.sparkline.js',
			'bootstrap-datepicker.js',
			'masked-input.min.js',
			'bootstrap-timepicker.min.js',
			'bootstrap-combobox.js',
			'bootstrap-select.min.js',
			'bootstrap-tagsinput.min.js',
			'bootstrap-tagsinput-typeahead.js',
			'tag-it.min.js',
			'moment-with-locales.min.js',

			'jquery.bootgrid.updated.min.js',
			'jquery.tmpl.min.js',
			'sweet-alert.min.js',
			'waves.min.js',

			'select2.min.js',
			'bootstrap-datetimepicker.min.js',
			'form-plugins.demo.min.js',
			'apps.js'
		], 'public/js/app.js');

	// Invoice Styles and Scripts
		mix.styles([
			'jquery-ui.min.css',
			'bootstrap.min.css',
			'font-awesome.min.css',
			'animate.min.css',
			'style.min.css',
			'style-responsive.min.css',
			'invoice-print.min.css',
			'red.css',
		], 'public/css/invoice.css');

		mix.scripts([
			'pace.min.js',
			'jquery-1.9.1.min.js',
			'jquery-migrate-1.1.0.min.js',
			'jquery-ui.min.js',
			'bootstrap.min.js',
			'jquery.slimscroll.min.js',
			'jquery.cookie.js',
			'apps.js'
		], 'public/js/invoice.js');

});
