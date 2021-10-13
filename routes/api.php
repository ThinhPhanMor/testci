<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/test', 'Api\DemoController@getDemo')->name('getDemo');
Route::get('/test/test', 'Api\TestController@index')->name('base');
Route::get('/order', 'Api\OrderController@index')->name('order');
Route::get('/product', 'Api\ProductController@index')->name('product');
Route::post('/product/store', 'Api\ProductController@add')->name('product_store');
Route::put('/product/update/{id}', 'Api\ProductController@edit')->name('product_edit');
Route::delete('/product/delete/{id}', 'Api\ProductController@delete')->name('product_delete');
