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
Route::group(['prefix' => 'tag'], function () {
    Route::post('/store', 'TagController@store');
    Route::get('/all', 'TagController@getAll');
});
Route::group(['prefix' => 'category'], function () {
    Route::post('/store', 'CategoryController@store');
});
Route::group(['prefix' => 'issue'], function () {
    Route::post('/store', 'IssueController@store');
});
