<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\customer;
use App\project;
use App\nup;
use App\booking;
use App\spr;
use App\bf;
use App\priority;
use Datatables;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class BookingController extends Controller
{
	public function getCustomer(){
	 $customer = customer::all();
        return view('page.booking.customer',compact('customer'));
    }
    public function getCustomerdata(){
    	$customer = customer::all();
    	return Datatables::of($customer)
    		->editColumn('image',function($customer){
    			return
          '<img src="'.asset("image/$customer->image").'" height="70" width="70" class="img-rounded" align="center">';
    		})
            ->addColumn('action',function($customer){
                return
                '<a href="customer/detail/'.$customer->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
								<a href="customer/edit/'.$customer->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                <a id="delete-btn" href="customer/hapus/'.$customer->id.'" class="btn btn-xs btn-danger" >
                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
                if($customer->status == "Active"){
                  return "<span class='label bg-green'>$customer->status</span>";
                }elseif ($customer->status == "Move Kavling"){
                  return "<span class='label label-warning'>$customer->status</span>";
                }else {
                  return "<span class='label bg-red'>$customer->status</span>";
                }
              })
              ->editColumn('priority_status',function($customer){
                if($customer->priority_status == "Not Priority"){
               return
                "<small class='label label-danger'>$customer->priority_status</small>";
              }else{
                return
                "<small class='label label-primary'>$customer->priority_status</small>";
              }
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
      'image' => 'required|image|mimes:jpg,jpeg,png|max:1048',
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
			$customer->code = mt_rand();
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

       $image = Input::file('image');
       $namafile = time().'.'.$image->getClientOriginalExtension();
       $path = public_path('image/'.$namafile);
       Image::make($image->getRealPath())->resize(200,200)->save($path);

      $customer->image = $namafile;
      $customer->save();
      alert()->success('Data berhasil disimpan !')->autoclose(3000);
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
      'email'=> 'required|min:0',
      'house_phone'=> 'required|numeric|min:0',
      'office_phone'=> 'required|numeric|min:0',
      'image' => 'image|mimes:jpg,jpeg,png|max:1048',
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
			$customer->bank_account_number = $request->input('bank_account_number');
			$customer->btn_id = $request->input('btn_id');
			$customer->btn_account_number = $request->input('btn_account_number');
			$customer->btn_branch = $request->input('btn_branch');
			$customer->mk_application = $request->input('mk_application');
			$customer->deposit_loan_akad = $request->input('deposit_loan_akad');
			$customer->status = $request->input('status');
			$customer->priority_status = $request->input('priority_status');

	    if(empty(Input::file('image'))){
	      $customer->image = $customer->image;
	    }else{
	      $image = Input::file('image');
	      $namafile = time().'.'.$image->getClientOriginalExtension();
	      $path = public_path('image/'.$namafile);
	      Image::make($image->getRealPath())->resize(200,200)->save($path);
	      $customer->image = $namafile;
	    }

      $customer->update();
      alert()->success('Data berhasil diupdate !')->autoclose(3000);
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
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('customer.view');
    }

    public function getNup(){
    $nup = nup::all();
    return view('page.booking.nup',compact('nup'));
    }
    public function getAddNup(){
    $nupcus = customer::all();
    $nuppro = project::all();
        return view('page.booking.addnup',compact('nupcus','nuppro'));
    }
    public function getEditNup($id){
      $edit = customer::where('id',$id)->first();
      return view('page.booking.editnup',compact('edit'));
    }

    public function postAddNup(Request $request){
      $this->validate($request,[
      'project'=>'required',
      'customer'=>'required',
      ]);
      $customer = customer::where('id',$request->input('customer'))->first();

      $nup = new nup();
      $nup->code = $customer->code;
      $nup->project_id = $request->input('project');
      $nup->customer_id = $request->input('customer');
      $nup->comission_status = "Pending";
      $nup->agen_id = 1;
      $nup->save();
      alert()->success('Data berhasil disimpan !')->autoclose(3000);
      return redirect()->route('nup.view');

    }
    public function getNupdata(){
        $nup = nup::join('project','nup.project_id','=','project.id');
        return Datatables::of($nup)
            ->addColumn('action',function($nup){
                return
                '<a href="nup/edit/'.$nup->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="nup/hapus/'.$nup->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus Nup dengan code'. $nup->code.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
           	->editColumn('customer',function($nup){
           		return $nup->customer->first_name." ".$nup->customer->last_name;
           	})
           	->editColumn('comission_status',function($nup){
           		if($nup->comission_status == 'Pending'){
           			return" <span class='label label-danger'>$nup->comission_status</span>";
           		}else{
           			return" <span class='label label-primary'>$nup->comission_status</span>";
           		}

           	})
           	->editColumn('nup_free',function($nup){
           		return "Rp ".number_format($nup->nup_free,0,'','.').',-';
           	})
            ->make(true);
		}
  public function getHapusNup($id){
      $nup = nup::find($id);
      alert()->success('Data berhasil dihapus !')->autoclose(3000);
      return redirect()->route('nup.view');
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
    public function getBookingfree(){
        $booking = customer::all();
        return view('page.booking.booking-fee',compact('booking'));
    }
    public function getBookingdata(){
    	$booking = bf::all();
    	return Datatables::of($booking)->make(true);
    }
    public function getAddBooking(){
      return view('page.booking.addbooking');
    }
    public function postAddBooking(){

    }
    public function getEditBooking(){

    }
    public function postUpdateBooking(){

    }
    public function getHapusBooking(){

    }

}
