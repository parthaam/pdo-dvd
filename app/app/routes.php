<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Route::get('/dvd/search', function() {
// 	return View::make('dvd/search');
// });

// Route::get('/dvd', function() {
// 	return View::make('dvd');
// }

Route::get('/dvd/search', 'DvdController@search');
Route::get('/dvds', 'DvdController@listDvds');
Route::get('/dvd/create', 'DvdController@createDvd');
Route::post('/dvd/insert-dvd', 'DvdController@insertDvd');
Route::get('/search', 'DvdController@searchFB');
Route::get('/get-facebook-ids', 'DvdController@getFacebookIds');