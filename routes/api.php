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

Route::post('/group', 'ApiGroupsController@store')->middleware('auth:api');
Route::patch('/group/{group}', 'ApiGroupsController@update')->middleware('auth:api');
Route::get('/group/user/{user}', 'ApiGroupsController@index')->middleware('auth:api');
Route::get('/group/{group}', 'ApiGroupsController@show')->middleware('auth:api');
Route::get('/group/{group}/users', 'ApiGroupsController@indexusers')->middleware('auth:api');
Route::post('/group/{group}/updatedistricts', 'ApiGroupsController@updatedistricts')->middleware('auth:api');
Route::post('/group/{group}/storescan', 'ApiGroupsController@storescan')->middleware('auth:api');
Route::get('/group/{group}/removescan/{scan}', 'ApiGroupsController@removescan')->middleware('auth:api');
Route::get('/grouprequest/{group}', 'ApiGrouprequestsController@index')->middleware('auth:api');
Route::get('/grouprequest/{grouprequest}/accept', 'ApiGrouprequestsController@accept')->middleware('auth:api');
Route::get('/grouprequest/{grouprequest}/deny', 'ApiGrouprequestsController@deny')->middleware('auth:api');

Route::get('/dashmessage/user/{user}/', 'ApiDashmessagesController@index')->middleware('auth:api');
Route::delete('/dashmessage/{dashmessage}', 'ApiDashmessagesController@delete')->middleware('auth:api');

Route::get('/scan/user/{user}', 'ApiScansController@indexuser')->middleware('auth:api');
Route::get('/scan', 'ApiScansController@index')->middleware('auth:api');
Route::post('/scan/', 'ApiScansController@store')->middleware('auth:api');
Route::get('/scan/{scan}', 'ApiScansController@show')->middleware('auth:api');
Route::post('/scan/{scan}', 'ApiScansController@update')->middleware('auth:api');
Route::get('/scan/{scan}/getdistricts', 'ApiScansController@getdistricts')->middleware('auth:api');
Route::post('/scan/{scan}/updatedistricts', 'ApiScansController@updatedistricts')->middleware('auth:api');
Route::post('/scan/{scan}/withanswers', 'ApiScansController@storewithanswers')->middleware('auth:api');
Route::get('/scan/{scan}/themes', 'ApiScansController@indexthemes')->middleware('auth:api');
Route::get('/scan/{scan}/answers', 'ApiScansController@indexanswers')->middleware('auth:api');
Route::post('/scan/{scan}/answers/{answer}', 'ApiScansController@postanswer')->middleware('auth:api');
Route::post('/answer/{answer}', 'ApiAnswersController@store')->middleware('auth:api');
Route::get('/scan/{scan}/theme/{theme}/questions', 'ApiScansController@indexquestions')->middleware('auth:api');
Route::get('/scan/{scan}/user/', 'ApiScansController@getuser')->middleware('auth:api');

Route::resource('measure', 'ApiMeasuresController')->middleware('auth:api');
Route::resource('district', 'ApiDistrictsController')->middleware('auth:api');
Route::resource('compares', 'ApiComparesController')->middleware('auth:api');

Route::get('/compare/{compare}/scan/{scan}', 'ApiComparesController@destroycompare')->middleware('auth:api');
Route::get('/compare/scan/{scan}', 'ApiComparesController@indexscan')->middleware('auth:api');
Route::post('/measure/{measure}/user/{user}', 'ApiMeasuresController@adduser')->middleware('auth:api');
Route::get('/measure/{measure}/user/{user}/removeuser', 'ApiMeasuresController@removeuser')->middleware('auth:api');

Route::get('/user/{user}/nomorehints', 'ApiUsersController@nomorehints')->middleware('auth:api');