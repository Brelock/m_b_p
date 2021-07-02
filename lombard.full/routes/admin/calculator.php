<?php

Route::group(['prefix' => 'calculator'], function () {



        Route::get('/calc-tariffs', 'CalcTariffController@index')->name('calc_tariffs.index');
        Route::post('/calc-tariffs', 'CalcTariffController@store')->name('calc_tariffs.store');

        Route::get('/calc-tariffs/get-tariff/{id}', 'CalcTariffController@getTariff')->name('calc_tariffs.get.tariff');
        Route::get('/calc-tariffs/{id}/edit', 'CalcTariffController@edit')->name('calc_tariffs.edit');
        Route::get('/calc-tariffs/create', 'CalcTariffController@create')->name('calc_tariffs.create');
        Route::post('/calc-tariffs/delete-all', 'CalcTariffController@destroyAll')->name('calc_tariffs.destroyAll');
        Route::patch('/calc-tariffs/{tariff}', 'CalcTariffController@update')->name('calc_tariffs.update');
        Route::delete('/calc-tariffs/{tariff}', 'CalcTariffController@destroy')->name('calc_tariffs.destroy');

        Route::get('/calc-tariffs/{id}/up', 'CalcTariffController@moveUp')->name('calc_tariffs_up');
        Route::get('/calc-tariffs/{id}/down', 'CalcTariffController@moveDown')->name('calc_tariffs_down');



//    Route::post('/offices/get-cities', 'OfficeController@getCities'); /admin/calculator/hallmarks/get-hallmarks
    Route::get('/hallmarks', 'CalcHallmarkController@index')->name('calc_hallmarks');
    Route::post('/hallmarks/save', 'CalcHallmarkController@save')->name('calc_hallmarks.save');


    Route::get('/statuses', 'CalcStatusController@index')->name('statuses.index');
    Route::get('/get-statuses', 'CalcStatusController@getStatuses')->name('statuses.get.list');
    Route::post('/statuses', 'CalcStatusController@store')->name('statuses.store');
    Route::patch('/statuses/{status}', 'CalcStatusController@update')->name('statuses.update');
    Route::delete('/statuses/{status}', 'CalcStatusController@destroy')->name('statuses.destroy');

    // заявки на оценку золота и серебра
    Route::get('/requests', 'CalcRequestController@index')->name('requests.index');
    Route::get('/requests/{request}', 'CalcRequestController@show')->name('requests.show');
    Route::post('/requests', 'CalcRequestController@destroyAll')->name('requests.destroyAll');
    Route::delete('/requests/{request}', 'CalcRequestController@destroy')->name('requests.destroy');

    Route::put('/requests/{id}', 'CalcRequestController@update')->name('requests.update');

    // заявки на оценку техники

//    Route::get('/gadgets/requests', 'CalcGadgetRequestController@index')->name('gadget.requests.index');
//    Route::get('/gadgets/requests/{request}', 'CalcGadgetRequestController@show')->name('gadget.requests.show');
    Route::post('/gadgets/requests', 'CalcGadgetRequestController@destroyAll')->name('gadget.requests.destroyAll');
    Route::delete('/gadgets/requests/{request}', 'CalcGadgetRequestController@destroy')->name('gadget.requests.destroy');
//
//    Route::put('/gadgets/requests/{id}', 'CalcGadgetRequestController@update')->name('gadget.requests.update');


    // раздел техника

    Route::get('/gadgets', 'CalcGadgetController@index')->name('gadgets.index');
    /*Route::get('/parser', 'CalcGadgetController@showParser')->name('parser.show');
    Route::post('/parser', 'CalcGadgetController@parse')->name('parser.parse');*/
    Route::get('/gadgets/{gadget}', 'CalcGadgetController@show')->name('gadgets.show');

    // бренды часов

    Route::get('/watches', 'CalcWatchController@index')->name('watches.index');
    Route::get('/get-watches', 'CalcWatchController@getWatches')->name('watches.get.list');
    Route::post('/watches', 'CalcWatchController@store')->name('watches.store');
    Route::patch('/watches/{watch}', 'CalcWatchController@update')->name('watches.update');
    Route::delete('/watches/{watch}', 'CalcWatchController@destroy')->name('watches.destroy');

});