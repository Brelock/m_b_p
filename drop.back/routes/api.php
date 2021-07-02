<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
  #### TEST ####

  Route::get('test/download-xml', 'TestController@downloadXml');
  Route::get('test/parse-xml', 'TestController@parseXml');
  Route::get('test/import', 'TestController@import');
  Route::get('test/queue', 'TestController@queue');

  #### TEST ####

  #### AUTH ####

  Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@authenticate')->name('login');
  });

  #### AUTH ####

  #### NOVA POSHTA ####

  Route::group(['prefix' => 'novaposhta', 'namespace' => 'NovaPoshta'], function() {
    #### WAREHOUSES ####

    Route::group(['prefix' => 'warehouses'], function() {
      Route::get('/', 'WarehouseController@index');
    });

    #### WAREHOUSES ####
  });

  #### NOVA POSHTA ####

  #### VERIFY ROUTES ####

  Route::group(['middleware' => ['jwt.verify']], function () {
    #### AUTH ####

    Route::group(['prefix' => 'auth'], function () {
      Route::get('/user', 'AuthController@getAuthenticatedUser');
      Route::get('/logout', 'AuthController@logout');
    });

    #### AUTH ####

    #### USER ####

    Route::group(['prefix' => 'users'], function () {
      Route::get('/', 'UserController@index');
      Route::get('/{user}', 'UserController@show');
      Route::post('/', 'UserController@store')->name('createUser');
      Route::put('/{user}', 'UserController@update');
      Route::delete('/{user}', 'UserController@destroy');
      Route::put('/restore/{restoreUser}', 'UserController@restore');
    });

    #### USER ####
  });
});
