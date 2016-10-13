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
		Route::post('project/{id}/kavling/add',[
			'uses' => 'ProjectController@postAddKavling',
			'as' => 'kavling.add'
		]);
		Route::get('project/{id}/kavling/edit/{kav_id}',[
			'uses' => 'ProjectController@getEditKavling',
			'as' => 'kavling.edit'
		]);
		Route::post('project/{id}/kavling/update/{kav_id}',[
			'uses' => 'ProjectController@postUpdateKavling',
			'as' => 'kavling.update'
		]);
		Route::get('project/{id}/kavling/hapus/{kav_id}',[
			'uses' => 'ProjectController@getHapusKavling',
			'as' => 'kavling.hapus'
		]);
		Route::get('project/{id}/get-kavling','ProjectController@getKavlingdata');

		/*
		 *****Price List*****
		 */
		Route::get('project/{id}/pricelist',[
			'uses' => 'ProjectController@getPricelist',
			'as' => 'pricelist.view'
		]);
		Route::get('project/{id}/pricelist/add',[
			'uses' => 'ProjectController@getAddPricelist',
			'as' => 'pricelist.add'
		]);
		Route::post('project/{id}/pricelist/add',[
			'uses' => 'ProjectController@postAddPricelist',
			'as' => 'pricelist.add'
		]);
		Route::get('project/{id}/pricelist/edit/{price_id}',[
			'uses' => 'ProjectController@getEditPricelist',
			'as' => 'pricelist.edit'
		]);
		Route::post('project/{id}/pricelist/update/{price_id}',[
			'uses' => 'ProjectController@postUpdatePricelist',
			'as' => 'pricelist.update'
		]);
		Route::get('project/{id}/pricelist/hapus/{price_id}',[
			'uses' => 'ProjectController@getHapusPricelist',
			'as' => 'pricelist.hapus'
		]);

		/*
		 *****Siteplan*****
		 */
		Route::get('project/siteplan/{id}',[
			'uses' => 'ProjectController@getSiteplan',
			'as' => 'siteplan.view'
		]);
		Route::get('project/siteplan/{id}/add',[
			'uses' => 'ProjectController@getAddSiteplan',
			'as' => 'siteplan.add'
		]);
		Route::post('project/siteplan/{id}/add',[
			'uses' => 'ProjectController@postAddSiteplan',
			'as' => 'siteplan.add'
		]);
		Route::get('project/siteplan/{id}/edit/{siteplan_id}',[
			'uses' => 'ProjectController@getEditSiteplan',
			'as' => 'siteplan.edit'
		]);
		Route::post('project/siteplan/{id}/update/{siteplan_id}',[
			'uses' => 'ProjectController@postUpdateSiteplan',
			'as' => 'pricelist.update'
		]);
		Route::get('project/siteplan/{id}/hapus/{siteplan_id}',[
			'uses' => 'ProjectController@getHapusSiteplan',
			'as' => 'siteplan.hapus'
		]);
		Route::get('project/siteplan/{id}/hapus/',[
			'uses' => 'ProjectController@getDropSiteplan',
			'as' => 'siteplan.drop'
		]);

    	/*
		 *****Profile*****
		 */
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

Route::get('/logout','userController@logout');

/*	
	Route::post('/lockscreen',[
		'uses' => 'userController@locked',
		'as' => 'user.locked'
	]);
*/

Route::get('/logout', [
    'uses' => 'userController@logout',
    'as' => 'admin.logout',
]);

Route::get('customer','BookingController@getCustomer');
Route::get('customer/add','BookingController@getAddCustomer');
Route::post('customer/add',[
	'uses' => 'BookingController@postAddProject',
	'as' => 'customer.add'
]);

