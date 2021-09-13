<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome');
Route::get('/rooms', 'HomeController@rooms');
Route::get('/rooms/{id}', 'HomeController@roomDetail');
Route::get('/about-us', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/reservation', 'HomeController@reservation');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('profile', 'UsersController@profile');
    Route::resource('bookings', 'BookingController');
    Route::resource('food', 'FoodController');
    Route::resource('rooms', 'RoomController');
    Route::resource('users', 'UsersController');
    Route::resource('feedbacks', 'FeedbackController');
});

Route::put('/password', 'UsersController@password');
Route::post('/feedback', 'FeedbackController@store');
Route::post('/check-availability', 'CheckController@checkAvailablity');
