<?php
// Need some better place
Route::get('/comparescans', 'ComparisonsController@index')->name('comparescans');

// Laravel Routes
Auth::routes();
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

// Resources GroupsController & ScanController and some other pages that need a better location
Route::resource('group', 'GroupsController')->middleware('auth');
Route::resource('scan', 'ScansController');
Route::get('/scan/{scan}/selfdestruct', 'ScansController@selfdestruct')->name('scan.selfdestruct');
Route::get('/group/{group}/delete', 'GroupsController@destroy')->middleware('auth');
Route::get('/group/{group}/created', 'GroupsController@created')->name('group.created')->middleware('auth');
Route::get('/group/{group}/createscan/{code}', 'GroupsController@createscan')->name('group.createscan')->middleware('auth');

// ScanpagesController
Route::get('/loggless', 'ScanpagesController@loggless')->name('scan.loggless');
Route::get('/scan/{scan}/startscan', 'ScanpagesController@startscan')->name('scan.startscan');
Route::get('/scan/{scan}/kennismaken', 'ScanpagesController@kennismaken')->name('scan.kennismaken');
Route::get('/scan/{scan}/regioincijfers', 'ScanpagesController@regioincijfers')->name('scan.regioincijfers');
Route::get('/scan/{scan}/algemeenbeeld', 'ScanpagesController@algemeenbeeld')->name('scan.algemeenbeeld');
Route::get('/scan/{scan}/algemeenbeeldresultaten', 'ScanpagesController@algemeenbeeldresultaten')->name('scan.algemeenbeeldresultaten');
Route::get('/scan/{scan}/showscan', 'ScanpagesController@showscan')->name('scan.showscan');
Route::get('/scan/{scan}/showmeasures', 'ScanpagesController@showmeasures')->name('scan.showmeasures');
Route::get('/scan/{scan}/complete', 'ScanpagesController@scancomplete')->name('scan.complete');
Route::get('/scan/{scan}/emailresults', 'ScanpagesController@emailresults')->name('scan.emailresults');
Route::get('/scan/{scan}/resultsmailed', 'ScanpagesController@resultsmailed')->name('scan.resultsmailed');
Route::get('/scan/{scan}/results', 'ScanpagesController@results')->name('scan.results');
Route::get('/scan/{scan}/measureresults', 'ScanPagesController@measureresults')->name('scan.measureresults');

// PagesController
Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/startscan', 'PagesController@startscan')->name('startscan');
Route::get('/kennisbank', 'PagesController@kennisbank')->name('kennisbank');
Route::get('/instructiefilms', 'PagesController@instructiefilms')->name('instructiefilms');
Route::get('/pmonitor', 'PagesController@pmonitor')->name('pmonitor');
Route::get('/grouprequested', 'PagesController@grouprequested')->name('grouprequested');
Route::get('/contact', 'PagesController@contact')->name('contact');

