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
*/

Route::get('/', 'HomeController@index')->name('guest.home');

Route::get('posts/{page?}', 'PostController@index')->name('guest.posts.index');
Route::get('post/{post_slug}', 'PostController@show')->name('guest.posts.show');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'web'], function () {

	Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
	Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

	Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
		
		/*
		|--------------------------------------------------------------------------
		| Dashboard Routes
		|--------------------------------------------------------------------------
		*/

		Route::get('/', 'DashboardController@index')->name('dashboard');

		/*
		|--------------------------------------------------------------------------
		| Posts & Partners Resources Routes
		|--------------------------------------------------------------------------
		*/

		Route::resource('posts', 'PostController', [
			'except' => 'show'
		]);

		Route::resource('partners', 'PartnerController', [
			'except' => 'show'
		]);

		/*
		|--------------------------------------------------------------------------
		| Site Info & Profile Routes
		|--------------------------------------------------------------------------
		*/

		Route::get('site-info', 'SiteInfoController@index')->name('site_info.index');
		Route::patch('site-info', 'SiteInfoController@update')->name('site_info.update');

		Route::get('profile', 'ProfileController@index')->name('profile.index');
		Route::patch('profile', 'ProfileController@update')->name('profile.update');

		/*
		|--------------------------------------------------------------------------
		| API Routes
		|--------------------------------------------------------------------------
		*/

		Route::post('posts/get', 'PostController@get')->name('posts.get');
		Route::post('partners/get', 'PartnerController@get')->name('partners.get');

	});
});
