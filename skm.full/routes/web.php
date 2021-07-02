<?php

/* SITE */
Route::get('/', 'MainController@index')->name('main');

Route::get('categories/{category}/{subcategory?}','CategoryController@show')->name('categories.show');

//Route::resource('categories', 'CategoryController', [
//    'only' => ['show']
//]);

Route::resource('products', 'ProductController',  [
    'only' => ['show']
]);

Route::resource('contacts', 'ContactController',  [
    'only' => ['index', 'show', 'store']
]);


/* ADMIN */

Route::group(['prefix' => 'admin/filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::name('admin.')
    ->prefix('admin')
    ->middleware('auth')
    ->namespace('Admin')
    ->group( function(){

    Route::post('/media/upload', 'MediaController@store')->name('media.store');
    Route::delete('/media/tmp', 'MediaController@deleteTmp')->name('media.deleteTmp');

    Route::get('/', 'CategoryController@index')->name('admin');

    Route::resource('categories', 'CategoryController', [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);
    Route::resource('subcategories', 'SubCategoryController', [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ])->parameters(['subcategories' => 'category']);

    Route::resource('products', 'ProductController',  [
        'only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']
    ]);

    Route::resource('slides', 'SlideController',  [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::resource('shops', 'ShopController',  [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::resource('users', 'UserController',  [
        'only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']
    ]);

    Route::resource('brands', 'BrandsController',  [
        'only' => ['index', 'store']
    ]);

    Route::resource('static-pages', 'StaticPageController',  [
        'only' => ['index', 'edit', 'update']
    ]);

    Route::resource('contact', 'ContactController',  [
        'only' => ['index', 'destroy']
    ]);

});

/* END ADMIN */

Auth::routes(['register' => false]);

Route::get('{page}', 'StaticPageController')->name('static.page');

