<?php

    Route::get('promos', 'PromoController@index')->name('admin.promos.index');

    Route::get('promos/create', 'PromoController@create')->name('promo.create');

    Route::post('promos/delete-all', 'PromoController@destroyAll')->name('promos.destroyAll');

    Route::get('promos/create', 'PromoController@create')->name('promos.create');

    Route::get('promos/edit/{id}', 'PromoController@edit')->name('promos.edit');

    Route::delete('promo/delete/{promo}', 'PromoController@destroy')->name('promo.delete');

    Route::post('promo/store', 'PromoController@store')->name('promo.store');

    Route::put('promos/update/{id}', 'PromoController@update')->name('promo.update');