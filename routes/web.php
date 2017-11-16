<?php

Auth::routes();

Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('scanmodel', 'ScanmodelsController');
Route::resource('thememodel', 'ThememodelsController');
Route::resource('questionmodel', 'QuestionmodelsController');
Route::resource('group', 'GroupsController');
Route::resource('scan', 'ScansController');
Route::resource('instantie', 'InstantiesController');
Route::resource('theme', 'ThemesController');
Route::resource('question', 'QuestionsController');
Route::resource('answer', 'AnswersController');
Route::resource('postcode', 'PostcodesController');
