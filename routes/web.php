<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Auth\LoginController@index');
Route::post('/add_user', 'Auth\RegisterController@add_user');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/get_user/{id}', 'Auth\RegisterController@get_user');
