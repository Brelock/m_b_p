<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
  Route::group(['middleware' => [\App\Http\Middleware\RedirectIfAdminAuthenticated::class]], function() {
    Route::get('/', 'LoginController@index')->name('login.index');
    Route::post('/auth', 'LoginController@authenticate')->name('auth');
  });

  #### VERIFY ROUTES ####

  Route::group(['middleware' => [\App\Http\Middleware\RedirectIfNotAuthenticated::class]], function() {
    Route::get('/logout', 'LoginController@logout')->name('logout');

    #### ORDERS ####

    Route::group(['prefix' => 'orders'], function() {
      Route::get('/', 'OrderController@index')->name('orders.index');
      Route::get('/archived', 'OrderController@archived')->name('orders.archived');
      Route::put('/{order}/archive', 'OrderController@archive')->name('order.archive');
    });

    #### ORDERS ####

    #### TEXTS ####

    Route::group(['prefix' => 'texts'], function() {
      Route::get('/', 'TextController@index')->name('texts.index');
      Route::put('/', 'TextController@update')->name('texts.update');
    });

    #### TEXTS ####

    #### LINKS ####

    Route::group(['prefix' => 'links'], function() {
      Route::get('/', 'LinkController@index')->name('links.index');
      Route::post('/', 'LinkController@create')->name('links.create');
      Route::put('/{link:id}', 'LinkController@update')->name('links.update');
      Route::get('/delete/{link}', "LinkController@destroy")->name('links.delete');
      Route::post('/reorder', "LinkController@reorder")->name('links.reorder');
    });

    #### LINKS ####

    #### XLS ####

    Route::group(['prefix' => 'xls'], function() {
      Route::get('/', 'XlsController@index')->name('xls.index');
      Route::post('/', 'XlsController@create')->name('xls.create');
      Route::put('/{xls}', 'XlsController@update')->name('xls.update');
      Route::delete('/{xls}', "XlsController@destroy")->name('xls.delete');
    });

    #### XLS ####

    #### BANNERS ####

	  Route::group(['prefix' => 'banners'], function () {
	  	Route::get('/', 'BannerController@index')->name('banners.index');
		  Route::post('/', 'BannerController@create')->name('banners.create');
		  Route::put('/{banner}', 'BannerController@update')->name('banners.update');
		  Route::get('/delete/{banner}', "BannerController@destroy")->name('banners.delete');
		  Route::post('/reorder', "BannerController@reorder")->name('banners.reorder');
	  });

    #### BANNERS ####

	  #### SUBSCRIPTION ####

    Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions.index');

    #### SUBSCRIPTION ####
  });

  #### VERIFY ROUTES ####
});
