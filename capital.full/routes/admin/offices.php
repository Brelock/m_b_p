<?php

Route::get('/offices', 'OfficeController@index')->name('offices');
Route::get('/offices/create', 'OfficeController@create')->name('offices.create');
Route::get('/offices/edit/{id}', 'OfficeController@edit')->name('offices.edit');
Route::put('/offices/update', 'OfficeController@update')->name('offices.update');
Route::post('/offices/store', 'OfficeController@store')->name('offices.store');

Route::delete('/offices/delete/{id}', 'OfficeController@destroy')->name('offices.delete');

Route::post('/offices/delete-all', 'OfficeController@destroyAll')->name('offices.destroyAll');

Route::post('/offices/get-cities', 'OfficeController@getCities');

Route::get('/offices/{office}/comments', 'OfficeController@showComments')->name('offices.show.comments');
Route::get('/offices/export-evaluation', 'OfficeController@exportEvaluations')->name('offices.export.evaluations');
Route::get('/offices/export-schedules', 'OfficeController@exportSchedules')->name('offices.export.schedules');
Route::get('/offices/{office}/get-qr-code', 'OfficeController@getCode')->name('get.qr.code');// /offices/14/get-qr-code
