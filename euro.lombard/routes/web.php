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
    return view('main.index-front');
})->name('main');

Route::get('about', function () {
    return view('about.about-front');
})->name('about');

Route::get('requisite', function () {
    return view('requisite.requisite-front');
})->name('requisite');

Route::get('career', function () {
    return view('career.career-front');
})->name('career');

Route::get('news', function () {
    return view('news.news-front');
})->name('news');

Route::get('action', function () {
    return view('action.action-front');
})->name('action');

Route::get('item-news', function () {
    return view('news.show-item-news-front');
})->name('item-news');

Route::get('item-action', function () {
    return view('action.show-item-action-front');
})->name('item-action');

Route::get('departments', function () {
    return view('departments.departments-front');
})->name('departments');

Route::get('gold', function () {
    return view('gold.gold-front');
})->name('gold');

Route::get('silver', function () {
    return view('silver.silver-front');
})->name('silver');

Route::get('technics', function () {
    return view('technics.technics-front');
})->name('technics');

Route::get('404', function () {
    return view('errorPage.404-front');
})->name('404');