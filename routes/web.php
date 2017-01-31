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

Route::get('/airports', 'AirportController@getAll');

Route::get('/trips', 'TripController@getAll');

Route::get('/trips/{tripId}', 'TripController@find')->where('tripId', '[a-z0-9]+');

Route::put('/trips/{tripId}/flights/{departCode}-{destCode}', 'TripController@addFlight')
	->where(['tripId' => '[a-z0-9]+', 'departCode' => '[A-Z]{3}', 'destCode' => '[A-Z]{3}']);

Route::delete('/trips/{tripId}/flights/{departCode}-{destCode}', 'TripController@deleteFlight')
	->where(['tripId' => '[a-z0-9]+', 'departCode' => '[A-Z]{3}', 'destCode' => '[A-Z]{3}']);

