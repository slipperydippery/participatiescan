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

Route::post('/group', 'ApiGroupsController@store');
Route::patch('/group/{group}', 'ApiGroupsController@update');
Route::get('/group/user/{user}', 'ApiGroupsController@index');
Route::get('/group/{group}', 'ApiGroupsController@show');
Route::get('/group/{group}/users', 'ApiGroupsController@indexusers');
Route::get('/group/{group}/getdistrict', 'ApiGroupsController@getdistrict');
Route::get('/group/{group}/removescan/{scan}', 'ApiGroupsController@removescan');
Route::get('/grouprequest/{group}', 'ApiGrouprequestsController@index');
Route::get('/grouprequest/{grouprequest}/accept', 'ApiGrouprequestsController@accept');
Route::get('/grouprequest/{grouprequest}/deny', 'ApiGrouprequestsController@deny');

Route::get('/dashmessage/user/{user}/', 'ApiDashmessagesController@index');
Route::delete('/dashmessage/{dashmessage}', 'ApiDashmessagesController@delete');

Route::get('/scan/user/{user}', 'ApiScansController@indexuser');
Route::get('/scan', 'ApiScansController@index');
Route::get('/scan/{scan}', 'ApiScansController@show');
Route::post('/scan/{scan}', 'ApiScansController@update');
Route::post('/scan/', 'ApiScansController@store');
Route::post('/scan/{scan}/withanswers', 'ApiScansController@storewithanswers');
Route::get('/scan/{scan}/themes', 'ApiScansController@indexthemes');
Route::get('/scan/{scan}/answers', 'ApiScansController@indexanswers');
Route::post('/scan/{scan}/answers/{answer}', 'ApiScansController@postanswer');
Route::post('/answer/{answer}', 'ApiAnswersController@store');
Route::get('/scan/{scan}/theme/{theme}/questions', 'ApiScansController@indexquestions');
Route::get('/scan/{scan}/user/', 'ApiScansController@getuser');

Route::resource('measure', 'ApiMeasuresController');
Route::resource('district', 'ApiDistrictsController');
Route::resource('compares', 'ApiComparesController');
Route::get('/compare/{compare}/scan/{scan}', 'ApiComparesController@destroycompare');
Route::post('/measure/{measure}/user/{user}', 'ApiMeasuresController@adduser');
Route::get('/measure/{measure}/user/{user}/removeuser', 'ApiMeasuresController@removeuser');

