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
Route::group(['middleware' => ['auth']],function(){
	Route::get('/',[
		'uses' => 'userController@getHome',
		'as' => 'user.home'
	]);

	Route::group(['middleware' => ['web']], function () {
		/*
		 *****project*****
		 */
		Route::get('project',[
			'uses' => 'ProjectController@getProject',
			'as' => 'project.view'
		]);
		Route::get('project/edit/{id}',[
			'uses' => 'ProjectController@getEditProject',
			'as' => 'project.edit'
		]);
		Route::get('project/hapus/{id}',[
			'uses' => 'ProjectController@getHapusProject',
			'as' => 'project.hapus'
		]);
		Route::post('project/update/{id}',[
			'uses' => 'ProjectController@postUpdateProject',
			'as' => 'project.update'
		]);
		Route::get('project/add',[
			'uses'=>'ProjectController@getAddProject',
		]);
		Route::post('project/add',[
			'uses' => 'ProjectController@postAddProject',
			'as' => 'project.add'
		]);
    	Route::get('project/get-project','ProjectController@getProjectdata');

    	/*
		 *****kavling*****
		 */
		Route::get('project/{id}/kavling',[
			'uses' => 'ProjectController@getKavling',
			'as' => 'kavling.view'
		]);
		Route::get('project/{id}/kavling/add',[
			'uses' => 'ProjectController@getAddKavling',
			'as' => 'kavling.add'
		]);
		Route::post('project/kavling/add',[
			'uses' => 'ProjectController@postAddKavling',
			'as' => 'kavling.add'
		]);
		Route::get('project/{id}/get-kavling','ProjectController@getKavlingdata');


    	// profile
    	Route::get('editprofile','userController@getEdit');
    	Route::get('editprofile/get-profile','userController@getEditdata');

	});

	Route::get('editprofile/{id}','userController@edit');

	Route::get('/lockscreen',[
		'uses' => 'userController@getlocked',
		'as' => 'user.locked',
	]);

});

Route::get('/login',[
	'uses' => 'userController@getLogin',
	'middleware'=> 'guest',
]);

Route::post('/login','userController@postLogin');

Route::get('/logout', [
    'uses' => 'userController@logout',
    'as' => 'admin.logout',
]);

Route::get('customer','CustomerController@getCustomer');
Route::get('customer/add','CustomerController@getAddCustomer');
Route::post('customer/add',[
	'uses' => 'CustomerController@postAddProject',
	'as' => 'customer.add'
]);
