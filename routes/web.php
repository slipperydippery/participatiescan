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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('scanmodel', 'ScanmodelsController');
Route::resource('partmodel', 'PartmodelsController');
Route::resource('questionmodel', 'QuestionmodelsController');
Route::resource('group', 'GroupsController');
Route::resource('scan', 'ScansController');
Route::resource('instantie', 'InstantiesController');
Route::resource('part', 'PartsController');
Route::resource('question', 'QuestionsController');
Route::resource('answer', 'AnswersController');
Route::resource('postcode', 'PostcodesController');
