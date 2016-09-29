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
Route::get('/',[
	'uses' => 'userController@getHome',
	'middleware' => 'auth'
]);
Route::get('/login',[
	'uses' => 'userController@getLogin',
	'middleware'=> 'guest'
]);
Route::post('/login','userController@postLogin');
Route::get('/logout','userController@logout');
Route::get('/editprofile','userController@getEdit');