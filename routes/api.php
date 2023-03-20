<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/listdata', 'ApiCategoryController@index')->name('api-showallcategory');
Route::post('/listdata/tambah-category', 'ApiCategoryController@store')->name('api-addcategory');
Route::get('/listdata/show/{id}', 'ApiCategoryController@show')->name('api-showdetailcategory');
Route::post('/listdata/edit/{id}', 'ApiCategoryController@update')->name('api-postcategory');
Route::get('/listdata/hapus/{id}', 'ApiCategoryController@destroy')->name('api-deletecategory');

