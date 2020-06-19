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

Route::get('/', 'GuestController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('actor', 'ActorController');
Route::resource('film', 'FilmController');

Route::get('/search/actor', 'ActorController@search')->name('actor.search');
Route::post('/search/actor', 'ActorController@query')->name('actor.query');

Route::get('/search/film', 'FilmController@search')->name('film.search');
Route::post('/search/film', 'FilmController@query')->name('film.query');

Route::get('/list/film', 'FilmController@list')->name('film.list');
Route::get('/list/actor', 'ActorController@list')->name('actor.list');
