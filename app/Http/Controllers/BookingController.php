<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\customer;
use App\nup;
use App\booking;
use App\spr;
use App\bf;
use App\priority;
use Datatables;

class BookingController extends Controller
{
	public function getCustomer(){
	 $customer = customer::all();
        return view('page.booking.customer',compact('customer'));
    }
    public function getCustomerdata(){
    	$customer = customer::all();
    	return Datatables::of($customer)
    		->addColumn('image',function($customer){
    			return '<a class="btn thumbnail"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:50px;color:black;"></i></a>';
    		})
            ->addColumn('action',function($customer){
                return
                '<a href="customer/detail/'.$customer->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Detail</a>
								<a href="customer/edit/'.$customer->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                <a href="customer/hapus/'.$customer->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus data customer '. $customer->first_name.' ?\')">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
              ->editColumn('name',function($customer){
                return 
                $customer->first_name.' '.$customer->last_name;
              })
							->editColumn('email',function($customer)
							{
								return
								'<a href="https://accounts.google.com/Login#identifier" target="output">'.$customer->email.'</a>';
							})
              ->editColumn('status',function($customer){
                return 
                '<small class="label bg-green">'.$customer->status.'</small>';
              })
              ->editColumn('priority_status',function($customer){
                return 
                '<small class="label bg-black">'.$customer->priority_status.'</small>';
              })
            ->make(true);

    }
		public function postAddcustomer(Request $request){
			$this->validate($request,[
			'first_name'=>'required|min:3|unique:customer,first_name',
			'last_name'=>'required|min:3|unique:customer,first_name',
			'house_address'=>'required|min:3',
			'ktp_number'=>'required|numeric|min:0',
			'ktp_expire'=>'required|min:0',
			'email'=>'required',
      'house_phone'=> 'required|numeric|min:0',
      'office_phone'=> 'required|numeric|min:0',
      'relative_name'=> 'required',
      'relative_phone'=> 'required|numeric|min:0',
      'relative_ktp'=> 'required',
      'spouse_name'=> 'required',
      'spouse_ktp'=> 'required',
      'image'=> 'required',
      'bank_account_number'=> 'required|numeric|min:0',
      'btn_id'=> 'required',
      'btn_account_number'=> 'required|numeric|min:0',
      'btn_branch'=> 'required',
      'mk_application'=> 'required',
      'deposit_loan_akad'=> 'required',
      'status'=> 'required',
      'priority_status'=> 'required',

			]);

			$customer = new customer();
		$customer->first_name = $request->input('first_name');
		$customer->last_name = $request->input('last_name');
		$customer->ktp_number = $request->input('ktp_number');
		$customer->ktp_expire = $request->input('ktp_expire');
		$customer->house_address = $request->input('house_address');
		$customer->office_address = $request->input('office_addres');
		$customer->email = $request->input('email');
		$customer->house_phone = $request->input('house_phone');
		$customer->office_phone = $request->input('office_phone');
		$customer->relative_name = $request->input('relative_name');
		$customer->relative_phone = $request->input('relative_phone');
		$customer->relative_ktp = $request->input('relative_ktp');
		$customer->spouse_name = $request->input('spouse_name');
		$customer->spouse_ktp = $request->input('spouse_ktp');
		$customer->image = $request->input('image');
		$customer->bank_account_number = $request->input('bank_account_number');
		$customer->btn_id = $request->input('btn_id');
		$customer->btn_account_number = $request->input('btn_account_number');
		$customer->btn_branch = $request->input('btn_branch');
		$customer->mk_application = $request->input('mk_application');
		$customer->deposit_loan_akad = $request->input('deposit_loan_akad');
		$customer->status = $request->input('status');
		$customer->priority_status = $request->input('priority_status');
			$customer->save();
		alert()->success('Data berhasil disimpan !');
		return redirect()->route('customer.view');

		}

    public function postUpdateCustomer(Request $request,$id){
      $this->validate($request,[
      'first_name'=>'required|min:3',
      'last_name'=>'required|min:3',
      'house_address'=>'required|min:3',
      'ktp_number'=>'required|numeric|min:0',
      'ktp_expire'=>'required|min:0',
      'house_address'=> 'required',
      'office_address'=> 'required',
      'email'=> 'required',
      'house_phone'=> 'required|numeric|min:0',
      'office_phone'=> 'required|numeric|min:0',
      'relative_name'=> 'required',
      'relative_phone'=> 'required|min:0',
      'relative_ktp'=> 'required',
      'spouse_name'=> 'required',
      'spouse_ktp'=> 'required',
      'bank_account_number'=> 'required|numeric|min:0',
      'btn_id'=> 'required',
      'btn_account_number'=> 'required|numeric|min:0',
      'btn_branch'=> 'required',
      'mk_application'=> 'required',
      'deposit_loan_akad'=> 'required',
      'status'=> 'required',
      'priority_status'=> 'required',
      ]);

			$customer = customer::where('id',$id)->first();
		$customer->first_name = $request->input('first_name');
		$customer->last_name = $request->input('last_name');
		$customer->ktp_number = $request->input('ktp_number');
		$customer->ktp_expire = $request->input('ktp_expire');
		$customer->house_address = $request->input('house_address');
		$customer->office_address = $request->input('office_address');
		$customer->email = $request->input('email');
		$customer->house_phone = $request->input('house_phone');
		$customer->office_phone = $request->input('office_phone');
		$customer->relative_name = $request->input('relative_name');
		$customer->relative_phone = $request->input('relative_phone');
		$customer->relative_ktp = $request->input('relative_ktp');
		$customer->spouse_name = $request->input('spouse_name');
		$customer->spouse_ktp = $request->input('spouse_ktp');
		$customer->image = $request->input('image');
		$customer->bank_account_number = $request->input('bank_account_number');
		$customer->btn_id = $request->input('btn_id');
		$customer->btn_account_number = $request->input('btn_account_number');
		$customer->btn_branch = $request->input('btn_branch');
		$customer->mk_application = $request->input('mk_application');
		$customer->deposit_loan_akad = $request->input('deposit_loan_akad');
		$customer->status = $request->input('status');
		$customer->priority_status = $request->input('priority_status');
      $customer->update();
      alert()->success('Data berhasil diupdate !');
      return redirect()->route('customer.view');
    }
    public function getAddcustomer(){
        return view('page.booking.addcustomer');
    }
		public function getEditCustomer($id){
     	$edit = customer::where('id',$id)->first();
    	return view('page.booking.editcustomer',compact('edit'));
    }
    public function getDetailCustomer($id){
      $detailcustomer = customer::where('id',$id)->first();
      return view('page.booking.detailcustomer',compact('detailcustomer'));
    }
    public function getHapusCustomer($id){
    	$customer = customer::find($id);
    	$customer->delete();
    	alert()->success('Data berhasil dihapus !');
    	return redirect()->route('customer.view');
    }




    public function getNup(){
        $nup = nup::all();
            return view('page.booking.nup',compact('nup'));
    }

    public function getAddnup(){
        return view('page.booking.addnup');
    }
    public function getNupdata(){
        $nup = nup::all();
        return Datatables::of($nup)
            ->addColumn('image',function($nup){
                return '<a class="btn thumbnail"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:50px;color:black;"></i></a>';
            })
            ->addColumn('action',function($nup){
                return
                '<a href="nup/edit/'.$nup->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="nup/hapus/'.$nup->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus customer '. $nup->name.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);
		}



		public function getSpr(){
				$booking = customer::all();
						return view('page.booking.spr',compact('spr'));
		}
		public function getAddspr(){
			return view('page.booking.addspr');
		}
        public function getSprdata(){
        $spr = spr::all();
        return Datatables::of($spr)
            ->addColumn('image',function($spr){
                return '<a class="btn thumbnail"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:50px;color:black;"></i></a>';
            })
            ->addColumn('action',function($spr){
                return
                '<a href="spr/edit/'.$spr->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="spr/hapus/'.$spr->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus customer '. $spr->name.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);
        }

}
