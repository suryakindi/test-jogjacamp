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
    return view('welcome');
});
Route::get('/listdata', 'CategoryController@index')->name('list-data');
Route::get('/listdata/tambah-category', 'CategoryController@create')->name('tambah-category');
Route::post('/listdata/tambah-category', 'CategoryController@store');
Route::get('/listdata/edit/{id}', 'CategoryController@edit');
Route::post('/listdata/edit/{id}', 'CategoryController@update')->name('edit-data');
Route::get('/listdata/hapus/{id}', 'CategoryController@destroy')->name('hapus-data');
