<?php

Auth::routes();

// Route::middleware(['first', 'second'])->group(function () {
// });

Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('scanmodel', 'ScanmodelsController');
Route::resource('group', 'GroupsController')->middleware('auth');
Route::resource('scan', 'ScansController')->middleware('auth');
Route::resource('question', 'QuestionsController');
Route::resource('answer', 'AnswersController');
Route::resource('postcode', 'PostcodesController');
