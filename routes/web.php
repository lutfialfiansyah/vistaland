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

Route::get('/',function(){
	return view('welcome');
});
Route::get('/home',[
	'uses' => 'userController@getHome',
	'middleware' => 'auth'
]);
Route::get('/login','userController@getLogin');
Route::post('/login','userController@postLogin');
Route::get('/logout','userController@logout');
