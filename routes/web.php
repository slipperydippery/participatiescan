<?php

Auth::routes();
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

// Route::middleware(['first', 'second'])->group(function () {
// });

Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/startscan', 'PagesController@startscan')->name('startscan');
Route::get('/comparescans', 'PagesController@comparescans')->name('comparescans')->middleware('auth');
Route::get('/loggless', 'ScanpagesController@loggless')->name('scan.loggless');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/passport', 'PagesController@passport');
Route::get('/kennisbank', 'PagesController@kennisbank')->name('kennisbank');
Route::get('/instructiefilms', 'PagesController@instructiefilms')->name('instructiefilms');
Route::get('/pmonitor', 'PagesController@pmonitor')->name('pmonitor');

Route::resource('scanmodel', 'ScanmodelsController');
Route::resource('group', 'GroupsController')->middleware('auth');
Route::resource('scan', 'ScansController');
Route::resource('question', 'QuestionsController');
Route::resource('answer', 'AnswersController');
Route::resource('postcode', 'PostcodesController');

Route::get('/scan/{scan}/startscan', 'ScanpagesController@startscan')->name('scan.startscan');
Route::get('/scan/{scan}/kennismaken', 'ScanpagesController@kennismaken')->name('scan.kennismaken');
Route::get('/scan/{scan}/regioincijfers', 'ScanpagesController@regioincijfers')->name('scan.regioincijfers');
Route::get('/scan/{scan}/algemeenbeeld', 'ScanpagesController@algemeenbeeld')->name('scan.algemeenbeeld');
Route::get('/scan/{scan}/algemeenbeeldresultaten', 'ScanpagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten');
Route::get('/scan/{scan}/showscan', 'ScanpagesController@showscan')->name('scan.showscan');
Route::get('/scan/{scan}/showmeasures', 'ScanpagesController@showmeasures')->name('scan.showmeasures');
Route::get('/scan/{scan}/scancomplete', 'ScanpagesController@scancomplete')->name('scan.complete');
Route::get('/scan/{scan}/results', 'ScanpagesController@results')->name('scan.results');

Route::get('/group/{group}/delete', 'GroupsController@destroy')->middleware('auth');
Route::get('/group/{group}/created', 'GroupsController@created')->name('group.created')->middleware('auth');
Route::get('/group/{group}/createscan/{code}', 'GroupsController@createscan')->name('group.createscan')->middleware('auth');

