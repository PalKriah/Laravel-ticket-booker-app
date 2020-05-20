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

Route::get('/movie','MovieController@index')->name('movies.show');
Route::post('/movie','MovieController@post');
Route::get('/upload', function () {
    return view('test');
});

Route::get('/', function () {
    return view('content.home');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/user', function() {
        return view('content.user');
    })->name('user');
});

Route::get('/movies','MovieController@index')->name('movies.index');
Route::get('/movies/{movie}','MovieController@show')->name('movies.show');

Route::get('/cinemas/list/{movie?}','CinemaController@index')->name('cinemas.index');
Route::get('/cinemas/schedule/{cinema}', 'CinemaController@schedule')->name('cinema.schedule');
Route::get('/cinemas/search', 'CinemaController@search')->name('cinema.search');
