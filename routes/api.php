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

Route::get('/promotion', 'PromotionController@all')->name('promotion.all');

Route::post('/promotion', 'PromotionController@store')->name('promotion.store');

Route::get('/promotion/{id}', 'PromotionController@show')->name('promotion.show');

Route::put('/promotion/{id}', 'PromotionController@update')->name('promotion.update');

Route::delete('/promotion/{id}', 'PromotionController@destory')->name('promotion.destroy');
