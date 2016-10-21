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
			'as' => 'siteplan.update'
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
		 *****Promo*****
		 */

		Route::get('promo',[
			'uses' => 'ProjectController@getPromo',
			'as' => 'promo.view'
		]);
		Route::get('promo/add',[
			'uses' => 'ProjectController@getAddPromo',
			'as' => 'promo.add'
		]);
		Route::post('promo/add',[
			'uses' => 'ProjectController@postAddPromo',
			'as' => 'promo.add'
		]);
		Route::get('promo/edit/{id}',[
			'uses' => 'ProjectController@getEditPromo',
			'as' => 'promo.edit'
		]);
		Route::post('promo/update/{id}',[
			'uses' => 'ProjectController@postUpdatePromo',
			'as' => 'promo.update'
		]);
		Route::get('promo/hapus/{id}',[
			'uses' => 'ProjectController@getHapusPromo',
			'as' => 'promo.hapus'
		]);
		Route::get('promo/get-promo','ProjectController@getPromodata');

		/*
		 ***************************Pembayaran**************************
		 */

			/*
				******form Payment******
			*/
		Route::get('formpayment',[
			'uses' => 'PaymentController@getFormpayment',
			'as' => 'formpayment.view'
		]);
		Route::get('formpayment/add',[
			'uses' => 'PaymentController@getAddFormpayment',
			'as' => 'formpayment.add'
		]);
		Route::post('formpayment/add',[
			'uses' => 'PaymentController@postAddFormpayment',
			'as' => 'formpayment.add'
		]);
		Route::get('formpayment/edit/{id}',[
			'uses' => 'PaymentController@getEditFormpayment',
			'as' => 'formpayment.edit'
		]);
		Route::post('formpayment/update/{id}',[
			'uses' => 'PaymentController@postUpdateFormpayment',
			'as' => 'formpayment.update'
		]);
		Route::get('formpayment/hapus/{id}',[
			'uses' => 'PaymentController@getHapusFormpayment',
			'as' => 'formpayment.hapus'
		]);
		Route::get('formpayment/get-formpayment','PaymentController@getFormpaymentdata');

		// Route::get('/ajax-customer',function(){
		// 	$customer = Input::get('type');
		// 	if($customer == "booking_free"){
		// 		$customer = booking_free::all();
		// 	}
		// });

		/*
				******Tax Payment******
			*/
		Route::get('taxpayment',[
			'uses' => 'PaymentController@getTaxpayment',
			'as' => 'taxpayment.view'
		]);
		Route::get('taxpayment/add',[
			'uses' => 'PaymentController@getAddTaxpayment',
			'as' => 'taxpayment.add'
		]);
		Route::post('taxpayment/add',[
			'uses' => 'PaymentController@postAddTaxpayment',
			'as' => 'taxpayment.add'
		]);
		Route::get('taxpayment/edit/{id}',[
			'uses' => 'PaymentController@getEditTaxpayment',
			'as' => 'taxpayment.edit'
		]);
		Route::post('taxpayment/update/{id}',[
			'uses' => 'PaymentController@postUpdateTaxpayment',
			'as' => 'taxpayment.update'
		]);
		Route::get('taxpayment/hapus/{id}',[
			'uses' => 'PaymentController@getHapusTaxpayment',
			'as' => 'taxpayment.hapus'
		]);
		Route::get('taxpayment/get-taxpayment','PaymentController@getTaxpaymentdata');

		/*
		 ***************************Perubah Data**************************
		 */
			/*
			 ******* Change name
			 */
		Route::get('change-name',[
			'uses' => 'PerubahanController@getChangename',
			'as' => 'change-name.view'
		]);
		Route::get('change-name/add',[
			'uses' => 'PerubahanController@getAddChangename',
			'as' => 'change-name.add'
		]);
		Route::post('change-name/add',[
			'uses' => 'PerubahanController@postAddChangename',
			'as' => 'change-name.add'
		]);
		Route::get('change-name/edit/{id}',[
			'uses' => 'PerubahanController@getEditChangename',
			'as' => 'change-name.edit'
		]);
		Route::post('change-name/update/{id}',[
			'uses' => 'PerubahanController@postUpdateChangename',
			'as' => 'change-name.update'
		]);
		Route::get('change-name/hapus/{id}',[
			'uses' => 'PerubahanController@getHapusChangename',
			'as' => 'change-name.hapus'
		]);
		Route::get('change-name/get-change-name','PerubahanController@getChangenamedata');




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
Route::get('/logout', [
    'uses' => 'userController@logout',
    'as' => 'admin.logout',
]);

/*
*****customer*****
*/
Route::get('customer','BookingController@getCustomer');
Route::get('customer',[
			'uses' => 'BookingController@getCustomer',
			'as' => 'customer.view'
		]);
Route::get('customer/add','BookingController@getAddCustomer');
Route::post('customer/add',[
	'uses' => 'BookingController@postAddcustomer',
	'as' => 'customer.add'
]);
Route::get('customer/get-customer','BookingController@getCustomerdata');
Route::get('customer/hapus/{id}',[
	'uses' => 'BookingController@getHapusCustomer',
	'as' => 'customer.hapus'
]);

Route::get('customer/detail/{id}',[
	'uses' => 'BookingController@getDetailCustomer',
	'as' => 'customer.detail'
	]);
Route::get('customer/edit/{id}',[
			'uses' => 'BookingController@getEditCustomer',
			'as' => 'customer.edit'
		]);
Route::post('customer/update/{id}',[
			'uses' => 'BookingController@postUpdateCustomer',
			'as' => 'customer.update'
		]);
/*end customer*/


/*
*****nup*****
*/
Route::get('nup','BookingController@getNup');
Route::get('nup',[
	'uses' => 'BookingController@getNup',
	'as' => 'nup.view'
	]);
Route::get('nup/add','BookingController@getAddNup');
Route::post('nup/add',[
	'uses' => 'BookingController@postAddNup',
	'as' => 'nup.add'
]);
Route::get('nup/get-nup','BookingController@getNupdata');
/*end up*/

/*
*****booking fee*****
*/
Route::get('booking-fee','BookingController@getBooking');
Route::get('booking-fee',[
	'uses' => 'BookingController@getBooking',
	'as' => 'booking.view'
	]);
Route::get('booking/add','BookingController@getAddBooking');
Route::post('booking/add',[
	'uses' => 'BookingController@postAddBooking',
	'as' => 'booking.add'
]);
Route::get('booking/get-booking','BookingController@getBookingdata');
/*end customer*/
/*
*****SPR*****
*/
Route::get('spr','BookingController@getSpr');
Route::get('spr',[
	'uses' => 'BookingController@getSpr',
	'as' => 'spr.view'
	]);
Route::get('spr/add','BookingController@getAddSpr');
Route::post('spr/add',[
	'uses' => 'BookingController@postAddSpr',
	'as' => 'spr.add'
]);
Route::get('spr/get-spr','BookingController@getSprdata');
/*end SPR*/
