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

Route::get('/scan/{scan}', 'ApiScansController@show');
Route::get('/scan/{scan}/themes', 'ApiScansController@indexthemes');
Route::get('/scan/{scan}/answers', 'ApiScansController@indexanswers');
Route::get('/scan/{scan}/theme/{theme}/questions', 'ApiScansController@indexquestions');
