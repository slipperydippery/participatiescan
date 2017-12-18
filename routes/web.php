<?php

Auth::routes();

// Route::middleware(['first', 'second'])->group(function () {
// });

Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/startscan', 'PagesController@startscan')->name('startscan');
Route::get('/comparescans', 'PagesController@comparescans')->name('comparescans')->middleware('auth');
Route::get('/loggless', 'ScanpagesController@loggless')->name('scan.loggless');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/passport', 'PagesController@passport');

Route::resource('scanmodel', 'ScanmodelsController');
Route::resource('group', 'GroupsController')->middleware('auth');
Route::resource('scan', 'ScansController');
Route::resource('question', 'QuestionsController');
Route::resource('answer', 'AnswersController');
Route::resource('postcode', 'PostcodesController');

Route::get('/scan/{scan}/kennismaken', 'ScanpagesController@kennismaken')->name('scan.kennismaken');
Route::get('/scan/{scan}/regioincijfers', 'ScanpagesController@regioincijfers')->name('scan.regioincijfers');
Route::get('/scan/{scan}/algemeenbeeld', 'ScanpagesController@algemeenbeeld')->name('scan.algemeenbeeld');
Route::get('/scan/{scan}/algemeenbeeldresultaten', 'ScanpagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten');
Route::get('/scan/{scan}/showscan', 'ScanpagesController@showscan')->name('scan.showscan');
Route::get('/scan/{scan}/showmeasures', 'ScanpagesController@showmeasures')->name('scan.showmeasures');

Route::get('/group/{group}/delete', 'GroupsController@destroy')->middleware('auth');

