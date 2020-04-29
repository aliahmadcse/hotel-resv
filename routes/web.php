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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','BookingController@index');

Route::get('/test' , function(){return "Good Bye";});

Route::get('/rooms/{roomNumber?}','ShowRoomsController');

// Route::get('/bookings','BookingController@index');
// Route::get('/bookings/create','BookingController@create');
// Route::post('/bookings','BookingController@store');
// Route::get('bookings/{booking}','BookingController@show');
// Route::get('bookings/{booking}/edit','BookingController@edit');
// Route::put('/bookings/{booking}','BookingController@update');
// Route::delete('/booking/{booking}','BookingController@destroy');

Route::resource('bookings','BookingController');
