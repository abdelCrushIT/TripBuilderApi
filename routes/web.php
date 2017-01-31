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

Route::get('/airports', 'AirportController@index');
Route::get('/trips/{tripId}', 'TripController@find');
Route::put('/trips/{tripId}/flights/{departCode}-{destCode}', 'TripController@addFlight');
Route::delete('/trips/{tripId}/flights/{departCode}-{destCode}', 'TripController@deleteFlight');
