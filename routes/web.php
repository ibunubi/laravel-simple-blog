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

Route::get('/', 'PostController@index')->name('home');
Route::prefix('post')->group(function () {
    Route::get('/create', 'PostController@create')->name('postCreate');
    Route::post('/create', 'PostController@store')->name('postStore');
    Route::get('/{id}', 'PostController@detail')->name('postDetail');
    Route::get('/tag/{id}', 'PostController@tag')->name('postTag');
});
