<?php

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

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/inoguration', function () {
    return view('inoguration.inoguration');
})->name('inoguration');

Route::get('/barragesDeMontezic', function () {
    return view('barragesDeMontezic.barragesDeMontezic');
})->name('barragesDeMontezic');

Route::get('/barragesDeLanau', function () {
    return view('barragesDeLanau.barragesDeLanau');
})->name('barragesDeLanau');

Route::get('/barragesDeSarrans', function () {
    return view('barragesDeSarrans.barragesDeSarrans');
})->name('barragesDeSarrans');

Route::get('/barragesDeCastelnau', function () {
    return view('barragesDeCastelnau.barragesDeCastelnau');
})->name('barragesDeCastelnau');

Route::get('/expositions', function () {
    return view('expositions.expositions');
})->name('expositions');

Route::get('/infos', function () {
    return view('infos.infos');
})->name('infos');


// Route::get('/contact', function () {
//     return view('contact.index-front');
// })->name('contact');
