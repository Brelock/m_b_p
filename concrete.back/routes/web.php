<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index')->name('site.home');

#### CREATE REQUEST ####

Route::post('/requests', 'RequestController@store')->name('requests.send');

#### CREATE REQUEST ####

#### CALCULATION ####

Route::post('/calculation', 'ResultController@store')->name('calculation');

#### CALCULATION ####

#### CATEGORY ####

Route::group(['prefix' => '/categories'], function() {
	Route::get('/', 'CategoryController@index')->name('categories.index');
	Route::get('/{category}', 'CategoryController@show')->name('categories.show');
});

#### CATEGORY ####

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

#### ADMIN PANEL ####

Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {

	#### SETTINGS ####

	Route::group(['prefix' => '/settings'], function() {
		Route::get('/', 'SettingController@edit')->name('settings');
		Route::post('/', 'SettingController@store')->name('settings.store');
		Route::put('/{setting}', 'SettingController@update')->name('settings.update');
	});

	#### SETTINGS ####

	#### REQUEST ####

	Route::get('/requests', 'RequestController@index')->name('requests');

	#### REQUEST ####

	#### CATEGORY ####

	Route::group(['prefix' => '/categories'], function() {
		Route::get('/', 'CategoryController@index')->name('categories');
		Route::get('/{category}', 'CategoryController@show')->name('categories.show');
		Route::get('/{category}/edit', 'CategoryController@edit')->name('categories.edit');
		Route::put('/{category}', 'CategoryController@update')->name('categories.update');
	});

	#### CATEGORY ####

	#### RESULT ####

	Route::get('/results', 'ResultController@index')->name('results');

	#### RESULT ####

});

#### ADMIN PANEL ####