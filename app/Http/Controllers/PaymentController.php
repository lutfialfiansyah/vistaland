<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Datatables;
use App\tax_payment;
use App\kavling;
use App\payment;

class PaymentController extends Controller
{
	// Form payment
 	public function getFormpayment(){
 		return view('page.payment.formpayment');
 	}

 	public function getFormpaymentdata(){
 		$payment = payment::all();
 		return Datatables::of($payment)
 			->addColumn('action',function(){
 				return 
 				'<a href="" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
 				 <a href="" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>';
 			})
 			->make(true);
 	}

 	public function getAddFormpayment(){
 		return view('page.payment.addformpayment');
 	}   

 	public function postAddFormpayment(Request $request){
 	
 	}

 	public function getEditFormpayment($id){

 	} 

 	public function postUpdateFormpayment(Request $request,$id){

 	}

 	public function getHapusFormpayment(){

 	}


 	// Tax payment
 	public function getTaxpayment(){
 		return view('page.payment.taxpayment');
 	}

 	public function getTaxpaymentdata(){
 		$taxpayment = tax_payment::all();
 		return Datatables::of($taxpayment)
 				->make(true);
 	}

 	public function getAddTaxpayment(){
 		$kavling = kavling::all();
 		return view('page.payment.addtaxpayment',['kavling' => $kavling]);
 	}   

 	public function postAddTaxpayment(Request $request){
 		$this->validate($request,[
			'kavling_id'=>'required|',
			'ssp_total'=>'required|',
			'bphtb_total'=>'required|',
		]);
 	}

 	public function getEditTaxpayment($id){

 	} 

 	public function postUpdateTaxpayment(Request $request,$id){

 	}

 	public function getHapusTaxpayment(){

 	}
}
