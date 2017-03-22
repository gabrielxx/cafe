<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function(){

	Route::auth();
	Route::get('/', 'HomeController@index');
	Route::get('give', 'HomeController@give');

	/*
	| Resources for services module.
	|
	*/
	Route::resource('services', 'ServicesController');
	Route::resource('items', 'ItemsController');
	Route::resource('invoices', 'InvoicesController', ['only' => ['store']]);
	Route::get('print/{id}', 'HomeController@pdf');
	Route::get('database/{year}', 'HomeController@database');

	/*
	| Resources for referrals module.
	|
	*/
	Route::resource('referrals', 'ReferralsController');

	/*
	| Resources for payrolls module.
	|
	*/
	Route::resource('paysheets', 'PaysheetsController');

	/*
	| Resources for geolocation module.
	|
	*/
	Route::resource('geolocation', 'GeolocationController');

	/*
	| Resources for geolocation module.
	|
	*/
	Route::resource('messaging', 'MessagingController');

	/*
	| Resources for administration module.
	|
	*/
	Route::resource('drivers', 		'DriversController', 		['only' => ['index', 'store', 'update', 'destroy', 'show']]);
	Route::resource('routes', 		'RoutesController', 		['only' => ['index', 'store', 'update', 'destroy', 'show']]);
	Route::resource('subsidiaries', 'SubsidiariesController', 	['only' => ['index', 'store', 'update', 'destroy', 'show']]);
	Route::resource('tabulators', 	'TabulatorsController', 	['only' => ['index', 'update', 'show']]);

});