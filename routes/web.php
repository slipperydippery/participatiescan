<?php

Auth::routes();

// Route::middleware(['first', 'second'])->group(function () {
// });

Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/startscan', 'PagesController@startscan')->name('startscan');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('scanmodel', 'ScanmodelsController');
Route::resource('group', 'GroupsController')->middleware('auth');
Route::resource('scan', 'ScansController')->middleware('auth');
Route::resource('question', 'QuestionsController');
Route::resource('answer', 'AnswersController');
Route::resource('postcode', 'PostcodesController');

Route::get('/scan/{scan}/kennismaken', 'ScanpagesController@kennismaken')->name('scan.kennismaken')->middleware('auth');
Route::get('/scan/{scan}/regioincijfers', 'ScanpagesController@regioincijfers')->name('scan.regioincijfers')->middleware('auth');
Route::get('/scan/{scan}/algemeenbeeld', 'ScanpagesController@algemeenbeeld')->name('scan.algemeenbeeld')->middleware('auth');
Route::get('/scan/{scan}/algemeenbeeldresultaten', 'ScanpagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten')->middleware('auth');
Route::get('/scan/{scan}/showscan', 'ScanpagesController@showscan')->name('scan.showscan')->middleware('auth');
