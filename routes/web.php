<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function () {

	/*
	|--------------------------------------------------------------------------
	| Guest Routes
	|--------------------------------------------------------------------------
	|
	*/

	Route::get('/', 'HomeController@index');

	/*
	|--------------------------------------------------------------------------
	| Admin Routes
	|--------------------------------------------------------------------------
	|
	*/

	Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

	Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
		Route::get('/', 'DashboardController@index');

		Route::resources([
			'posts' => 'PostController',
			'partners' => 'PartnerController'
		]);

		// API
		Route::post('posts/all', 'PostController@get')->name('posts.get');
		Route::post('partners/all', 'PostController@get')->name('partners.get');

		Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showPopup');
	});

});
