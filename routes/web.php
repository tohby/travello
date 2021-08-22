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
Route::get('/about-us', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/reservation', 'HomeController@reservation');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::resource('food', 'FoodController');
    Route::resource('rooms', 'RoomController');
});
