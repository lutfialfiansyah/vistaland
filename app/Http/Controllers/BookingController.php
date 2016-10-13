<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\Http\Requests;

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
                '<a href="project/edit/'.$customer->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="#" class="btn btn-xs btn-success"><i class="fa fa-users" aria-hidden="true"></i> Authorized user</a>
                 <a href="project/'.$customer->id.'/kavling" class="btn btn-xs btn-info"><i class="fa fa-home" aria-hidden="true"></i> Kavling</a>
                 <a href="project/'.$customer->id.'/pricelist" class="btn btn-xs btn-warning"><i class="fa fa-money" aria-hidden="true"></i> Price List</a>
                 <a href="project/hapus/'.$customer->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus project '. $customer->name.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);

    }
    public function postAddProject(Request $request){
    	$this->validate($request,[
		  'name'=>'required|min:3|unique:customer,name',    	
			'company'=>'required|min:3',
			'area'=>'required|numeric|min:0',
			'unit_total'=>'required|numeric|min:0',
			'location'=>'required',
	
    	]);

    }
    public function getAddcustomer(){
        return view('page.booking.addcustomer');
    }
}