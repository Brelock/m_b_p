<?php

Route::get('/links', 'LinkController@index')->name('links');
Route::get('/links/create', 'LinkController@create')->name('links.create');
Route::get('/links/edit/{id}', 'LinkController@edit')->name('links.edit');
Route::put('/links/update', 'LinkController@update')->name('links.update');
Route::post('/links/store', 'LinkController@store')->name('links.store');
Route::delete('/links/delete/{id}', 'LinkController@destroy')->name('links.delete');
