<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
#### CREATE CALLBACK ####

Route::post('/callbacks', 'CallbackController@store')->name('callback.send');

#### CREATE CALLBACK ####

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});

#### Location ####

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ], function () {

  Route::get('/', 'MainController@index')->name('site.home');

  #### COMPANY ####

  Route::get('company', 'CompanyController@index')->name('company');

  #### COMPANY ####

  #### CONTACT ####

  Route::get('contact', 'ContactController@index')->name('contact');

  #### CONTACT ####

  #### CREDIT ####

  Route::get('credit', 'CreditController@index')->name('credit');

  #### CREDIT ####

  #### INSURANCE ####

  Route::get('insurance', 'InsuranceController@index')->name('insurance');

  #### INSURANCE ####

  #### KNESS ####

  Route::get('kness', 'KnessController@index')->name('kness');

  #### KNESS ####

  #### SUNPORT ####

  Route::get('sunport', 'SunportController@index')->name('sunport');

  #### SUNPORT ####

  #### NEWS ####

  Route::group(['prefix' => '/news'], function () {
    Route::get('/', 'NewsController@index')->name('news.index');
    Route::get('/{news:alias}', 'NewsController@show')->name('news.show');
  });

  #### NEWS ####

  #### PROJECTS ####

  Route::group(['prefix' => '/projects'], function () {
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::get('/{project:alias}', 'ProjectController@show')->name('projects.show');
  });

  #### PROJECTS ####

  #### ABOUT ####

  Route::get('about', 'AboutController@index')->name('about');

  #### ABOUT ####

  #### PARTNER ####

  Route::get('partner', 'PartnerController@index')->name('partner');

  #### PARTNER ####

  #### PRIVATE PERSON ####

  Route::get('private-person', 'PrivatePersonController@index')->name('private-person');

  #### PRIVATE PERSON  ####

  #### SUNPOWER ####

  Route::get('sunpower', 'SunpowerController@index')->name('sunpower');

  #### SUNPOWER ####

  #### REVIEW ####

  Route::get('review', 'ReviewController@index')->name('review');

  #### REVIEW ####

  #### PRIVATE POLICE ####

  Route::get('private-police', 'PrivatePoliceController@index')->name('private-police');

  #### PRIVATE POLICE ####

  #### USER AGREEMENT ####

  Route::get('user-agreement', 'UserAgreementController@index')->name('user-agreement');

  #### USER AGREEMENT ####

  #### ADMIN ####

  Route::get('/admin', 'HomeController@index')->name('home');

  #### ADMIN ####

  #### STATISTIC ####

  Route::get('statistic', 'StatisticController@index')->name('statistic');

  #### STATISTIC ####
  
});

#### Location ####

Auth::routes();


#### ADMIN PANEL ####

Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

  #### SETTINGS ####

  Route::group(['prefix' => '/settings'], function () {
    Route::get('/', 'SettingController@edit')->name('settings');
    Route::post('/', 'SettingController@store')->name('settings.store');
    Route::put('/{setting}', 'SettingController@update')->name('settings.update');
  });

  #### SETTINGS ####

  #### CALLBACKS ####

  Route::group(['prefix' => '/callbacks'], function () {
    Route::get('/', 'CallbackController@index')->name('callbacks');
    Route::delete('/{callback}', 'CallbackController@destroy')->name('callbacks.destroy');
  });

	#### CALLBACKS ####

	#### PROJECTS ####

	Route::resource('projects', 'ProjectController')->except([
    'show'
  ]);

	Route::group(['prefix' => '/projects', 'as' => 'projects.'], function () {
    Route::put('/restore/{restoreProject}', 'ProjectController@restore')->name('restore');
    Route::post('/reorder', 'ProjectController@reorder')->name('reorder');
    Route::post('/reorder-picture', 'ProjectController@reorderPictures')->name('reorder-picture');
  });

	#### PROJECTS ####

	#### PRODUCTS ####

	Route::resource('products', 'ProductController')->except([
    'show'
  ]);

	Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
    Route::put('/restore/{restoreProduct}', 'ProductController@restore')->name('restore');
    Route::post('/reorder', 'ProductController@reorder')->name('reorder');
    Route::post('/reorder-picture', 'ProductController@reorderPictures')->name('reorder-picture');
  });

	#### PRODUCTS ####

	#### SUNPORTS ####

	Route::resource('sunports', 'SunportController')->except([
    'show'
  ]);

	Route::group(['prefix' => '/sunports', 'as' => 'sunports.'], function () {
    Route::put('/restore/{restoreSunport}', 'SunportController@restore')->name('restore');
    Route::post('/reorder', 'SunportController@reorder')->name('reorder');
  });

	#### SUNPORTS ####

	#### NEWS ####

	Route::resource('news', 'NewsController')->except([
    'show'
  ]);

	Route::group(['prefix' => '/news', 'as' => 'news.'], function () {
    Route::put('/restore/{restoreNews}', 'NewsController@restore')->name('restore');
    Route::post('/reorder-picture', 'NewsController@reorderPictures')->name('reorder-picture');
  });

	#### NEWS ####

	#### LANGUAGE LINES ####

	Route::group(['prefix' => '/language-lines', 'as' => 'language.lines.'], function () {
    Route::get('/', "LanguageLineController@edit")->name('edit');
    Route::put('/', "LanguageLineController@update")->name('update');
  });

	#### LANGUAGE LINES ####

  #### SOLUTIONS ####

  Route::resource('solutions', 'SolutionController')->except([
    'show'
  ]);

  Route::group(['prefix' => '/solutions', 'as' => 'solutions.'], function () {
    Route::post('/reorder', 'SolutionController@reorder')->name('reorder');
  });

  #### SOLUTIONS ####

	#### SEO ####

	Route::resource('seo', 'SeoController')->except([
    'show'
  ]);

	#### SEO ####

  #### REVIEWS TEXT ####

  Route::resource('review-texts', 'ReviewTextController')->except([
    'show'
  ]);
  Route::group(['prefix' => '/reviews-text', 'as' => 'reviews-text.'], function () {
    Route::post('/reorder', 'ReviewTextController@reorder')->name('reorder');
  });

  #### REVIEWS TEXT ####

  #### REVIEWS VIDEO ####

  Route::resource('review-videos', 'ReviewVideoController')->except([
    'show'
  ]);
  Route::group(['prefix' => '/reviews-video', 'as' => 'reviews-video.'], function () {
    Route::post('/reorder', 'ReviewVideoController@reorder')->name('reorder');
  });

  #### REVIEWS VIDEO ####

  #### REVIEWS FOTO ####

  Route::resource('review-fotos', 'ReviewFotoController')->except([
    'show'
  ]);
  Route::group(['prefix' => '/reviews-foto', 'as' => 'reviews-foto.'], function () {
    Route::post('/reorder', 'ReviewFotoController@reorder')->name('reorder');
  });

  #### REVIEWS FOTO ####

});

#### ADMIN PANEL ####
