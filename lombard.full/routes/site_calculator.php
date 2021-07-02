<?php

Route::group(['prefix' => 'calculator'], function () {

    // Route::get('/', function (){
    //     return response()->view('_layouts.404', [], 404);
    // })->name('calculator');
   Route::get('/gold', 'CalculatorController@indexGold')->name('calculator.gold');
    Route::get('/silver', 'CalculatorController@indexSilver')->name('calculator.silver');
    Route::get('/technics', 'CalculatorController@indexTechnics')->name('calculator.technics');
    Route::get('/calculate', 'CalculatorController@calculate')->name('calculate');
    Route::get('/correct-price/{price}/{cond}/{set}', 'CalculatorController@correctPrice')->name('correct.price');

//    Route::get('/', function (){
//        return view('site.calculator.calculator');
//    })->name('calculator');
//    Route::get('/get-hallmarks', 'CalculatorController@getHallmarks')->name('calculator.hallmarks.get');
//    Route::get('/get-tariffs', 'CalculatorController@getTariffs')->name('calculator.tariffs.get');

    Route::get('/get-categories', 'CalculatorController@getCategories')->name('calculator.categories.get');
    Route::get('/get-data', 'CalculatorController@getData')->name('calculator.data.get');
    Route::get('/get-hallmarks', 'CalculatorController@getHallmarks')->name('calculator.hallmarks.get');
    Route::get('/get-tariffs', 'CalculatorController@getTariffs')->name('calculator.tariffs.get');
    Route::get('/get-statuses', 'CalculatorController@getStatuses')->name('calculator.statuses.get');

    Route::get('/get-watches', 'CalculatorController@getWatches')->name('calculator.watches.get');

    Route::get('/get-cities', 'CalculatorController@getCities')->name('calculator.cities.get');
    Route::get('/get-departments/{id}', 'CalculatorController@getDepartments')->name('calculator.departments.get');
    Route::get('/get-brands', 'CalculatorController@getBrands')->name('calculator.brands.get');
    Route::get('/get-models', 'CalculatorController@getModels')->name('calculator.models.get');


    Route::post('/requests-temp-image', 'CalculatorController@storeTempImage')->name('calculator.temp.store');
    Route::delete('/requests-temp-image/{name}', 'CalculatorController@destroyTempImage')->name('calculator.temp.destroy');
    Route::post('/requests', 'CalculatorController@storeRequest')->name('calculator.request.store');
    Route::post('/gadgets-requests', 'CalculatorController@storeGadgetRequest')->name('calculator.gadget.request.store');

    // специальные возможности

    Route::post('/special-abilities', 'CalculatorController@storeSpecialRequest')->name('calculator.gadget.request.store');

    Route::get('/special-abilities', 'CalcSpecialAbilityController@index')->name('special.abilities');//return view('site.calculator.special_abilities');

});
