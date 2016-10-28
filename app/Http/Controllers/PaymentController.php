<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use Datatables;
use App\price;
use App\tax_payment;
use App\kavling;
use App\kavling_type;
use App\customer;
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
 			->addColumn('action',function($payment){
 				return
 				'<a href="formpayment/edit/'.$payment->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
 				 <a href="formpayment/hapus/'.$payment->id.'" class="btn btn-xs btn-danger" id="confirm"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>';
 			})
 			->editColumn('method',function($payment){
 				return "<span class='label label-primary'>$payment->method</span>";
 			})
 			->editColumn('customer',function($payment){

 				 return $payment->customer->first_name;
 			})
 			->make(true);
 	}

 	public function getAddFormpayment(){
 		$k_type = kavling_type::all();
 		$customer = customer::all();
 		return view('page.payment.addformpayment',compact('customer','booking','change','k_type'));
 	}

 	public function postAddFormpayment(Request $request){
 		$payment = new payment();
 		$input = Input::all();
 		$d_payment = payment::where('id',$payment->id)->first();
 		$syarat = [
 			'type'=>'required',
 			'method'=>'required',
 			'bank_reference'=>'required',
 			'customer_id'=>'required'
 		];
							 		$message = [
							 			'type.required' => 'Anda harus memilih Type Pembayaran',
							 			'method.required' => 'Method Pembayaran harus diisi',
							 			'bank_reference.required' => 'Reference Bank harus diisi',
							 			'customer_id.required' => 'Anda belum memilih customer'
							 		];
		 		$validator = Validator::make($input,$syarat,$message);
		if($validator->fails()){
		 		return redirect()->route('formpayment.add')->withErrors($validator)->withInput();
		}else{
							if(count($d_payment) <= 0){
												$payment->type = Input::get('type');
										 		$payment->customer_id = Input::get('customer_id');
										 		$payment->method = Input::get('method');
										 		$payment->bank_reference = Input::get('bank_reference');
										 		$payment->description = Input::get('description');
										 		$payment->total = 0;
										 		$payment->transaction_id = 1;
										 		$payment->save();
										 		return redirect()->route('formpayment.add')->with('Pesan','Data behasil disimpan !');
								}else{
											return redirect()->route('formpayment.add')->with('Error','Data sudah tersedia');
								}
	 	}

 	}

 	public function getEditFormpayment($id){
 		$payment = payment::where('id',$id)->first();
 		return view('page.payment.editformpayment',['payment' => $payment]);
 	}

 	public function postUpdateFormpayment(Request $request,$id){
 		$this->validate($request,[
 			'customer_id' => '',
 			'method'=>'required',
 			'bank_reference'=>'required',
 			'customer_id'=>'required'
 		]);

			 		$payment = payment::where('id',$id)->first();
			 		$payment->type = Input::get('type');
			 		$payment->customer_id = $request->input('customer_id');
			 		$payment->method = $request->input('method');
			 		$payment->bank_reference = $request->input('bank_reference');
			 		$payment->description = $request->input('description');
			 		$payment->total = 0;
					$payment->transaction_id = 1;
			 		$payment->update();
 		alert()->success('Data berhasil diperbaharui !');
 		return redirect()->route('formpayment.view');
 	}

 	public function getHapusFormpayment($id){
 		$payment = payment::find($id)->first();
 		$payment->delete();
 		alert()->success('Data terhapus !');
 		return redirect()->route('formpayment.view');
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

		$taxpayment = new tax_payment();
		$taxpayment->kavling_id = $request->input('kavling_id');
		$taxpayment->ssp_total = $request->input('ssp_total');
		$taxpayment->bphtb_total = $request->input('bphtb_total');
		$taxpayment->save();
		return redirect()->route('taxpayment.view')->with('Data berhasil disimpan !');
 	}

 	public function getEditTaxpayment($id){

 	}

 	public function postUpdateTaxpayment(Request $request,$id){

 	}

 	public function getHapusTaxpayment(){

 	}
}
