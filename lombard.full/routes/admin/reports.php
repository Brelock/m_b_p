<?php


Route::get('/reports', 'ReportController@index')->name('reports.index');
Route::post('/reports', 'ReportController@update')->name('reports.update');

Route::delete('/reports/certificate/{report}', 'ReportController@destroyCertificate')->name('reports.certificate.destroy');
Route::delete('/reports/{report}', 'ReportController@destroy')->name('reports.destroy');

Route::post('/reports/delete-all', 'ReportController@destroyAll')->name('reports.destroyAll');

//Route::get('/documents/delete/{document}', 'DocumentController@destroy')->name('documents.destroy');
Route::delete('/documents/{document}', 'DocumentController@destroy')->name('documents.destroy');