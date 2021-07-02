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

Route::get('/', 'MainController@index')->name('main');

#### TEST ####

Route::get('test/internet-document', 'TestController@internetDocument');
Route::get('test/cities', 'TestController@cities');
Route::get('test/delete-zip-files', 'TestController@deleteZipFiles');

#### TEST ####

#### PRODUCTS ####

Route::group(['prefix' => 'products'], function () {
  Route::get('/', 'ProductController@index')->name('products.index');
  Route::get('/{product}', 'ProductController@show')->name('products.show');
  Route::post('/order', 'ProductController@order')->name('products.order');
});

#### PRODUCTS ####

#### CATEGORIES ####

Route::group(['prefix' => 'categories'], function () {
  Route::get('/', 'CategoryController@index')->name('categories.index');
  Route::get('/{category}', 'CategoryController@show')->name('categories.show');
});

#### CATEGORIES ####

#### CART ####

Route::group(['prefix' => 'cart'], function() {
  #### PAGES ####

  Route::get('/','CartController@index')->name('cart.index');

  #### PAGES ####

  #### ITEMS ####

  Route::put('/edit-item/{orderProduct}','CartController@editItem')->name('cart.editItem');
  Route::delete('/delete-item/{orderProduct}','CartController@deleteItem')->name('cart.deleteItem');

  #### ITEMS ####

  Route::post('/checkout','CartController@checkout')->name('cart.checkout');

  Route::get('/success','CartController@success')
    ->name('cart.success')
    ->middleware(\App\Http\Middleware\FlashSuccessOrderMiddleware::class);
});

#### CART ####

#### UNLOADING ####

Route::group(['prefix' => 'unload'], function() {
	Route::get('/', 'FileUnloadController@index')->name('unload.index');
  Route::get('/{unloadFile}','FileUnloadController@unload')->name('download.xls');
  Route::get('/zip/{product}','FileUnloadController@downloadPicturesZip')->name('download.zip');
});

#### UNLOADING ####

#### BANNERS ####
Route::group(['prefix' => 'banners'], function() {
	Route::get('/', 'BannerController@index')->name('banner.index');
});


#### BANNERS ####

#### CONTACTS ####

Route::get('/contacts', 'StaticPageController@contacts')->name('contacts');
Route::get('/deliveries', 'StaticPageController@deliveries')->name('deliveries');

#### CONTACTS ####

#### SUBSCRIPTIONS ####

Route::post('/subscriptions', 'SubscriptionController@store')->name('subscription.send');

#### SUBSCRIPTIONS ####

