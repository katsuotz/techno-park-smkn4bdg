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

Route::group(['middleware' => 'web'], function () {


	Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

	Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
		
		Route::get('/', 'DashboardController@index')->name('dashboard');

		Route::resource('posts', 'PostController', [
			'except' => 'show'
		]);

		Route::resource('partners', 'PartnerController', [
			'except' => 'show'
		]);

		// API
		Route::post('posts/get', 'PostController@get')->name('posts.get');
		Route::post('partners/get', 'PartnerController@get')->name('partners.get');
	});

});
