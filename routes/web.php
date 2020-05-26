<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('content.home');
});

Route::get('/movies', 'MovieController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');

Route::get('/cinemas-list/{movie?}', 'CinemaController@index')->name('cinemas.index');
Route::get('/cinemas/{cinema}', 'CinemaController@show')->name('cinemas.show');
Route::get('/cinemas-search', 'CinemaController@search')->name('cinemas.search');
Route::get('/cinemas-schedule', 'CinemaController@schedule')->name('cinemas.schedule');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/booking/{program}', 'BookingController@index')->name('booking.index');
    Route::post('/booking', 'BookingController@post')->name('booking.post');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/movie-create', 'MovieController@create')->name('movies.create');
    Route::post('/movie-insert', 'MovieController@insert')->name('movies.insert');
    Route::get('/movies-edit/{movie}', 'MovieController@edit')->name('movies.edit');
    Route::post('/movie-update/{movie}', 'MovieController@update')->name('movies.update');
    Route::post('/movie-delete/{movie}', 'MovieController@delete')->name('movies.delete');

    Route::get('/cinema-create', 'CinemaController@create')->name('cinemas.create');
    Route::post('/cinema-insert', 'CinemaController@insert')->name('cinemas.insert');
    Route::get('/cinemas-edit/{cinema}', 'CinemaController@edit')->name('cinemas.edit');
    Route::post('/cinema-update/{cinema}', 'CinemaController@update')->name('cinemas.update');
    Route::post('/cinema-delete/{cinema}', 'CinemaController@delete')->name('cinemas.delete');

    Route::get('/ownership', 'UserController@ownership')->name('users.ownership');
    Route::post('/ownership-insert', 'UserController@ownershipInsert')->name('users.ownership.insert');
    Route::post('/ownership-delete/{user}{cinema}', 'UserController@ownershipDelete')->name('users.ownership.delete');
});
