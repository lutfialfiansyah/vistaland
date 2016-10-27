<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;
use App\change_name;
use App\customer;
use App\customer_void;
use App\kavling;
use App\moving_kavling;
use Datatables;
use Validator;

class PerubahanController extends Controller
{

    public function getChangename()
    {
    	return view('page.perubahan data.changename');
    }

    public function getChangenamedata()
    {
    	$change_name = change_name::all();
 				return Datatables::of($change_name)
 						->addColumn('action',function($change_name){
			 				return
			 				'<a href="change-name/edit/'.$change_name->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
			 				 <a href="change-name/hapus/'.$change_name->id.'" class="btn btn-xs btn-danger" id="confirm"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>';
			 			})
			 			->make(true);
    }

    public function getAddChangename()
    {
    	 	$customer = DB::table('customer')->where('status','!=','Active')
    																	 	 ->pluck('first_name','id');

    	return view('page.perubahan data.addchangename',compact('customer'));
    }

    public function postAddChangename(Request $request)
    {
    	$input = Input::all();
    	$rules = [
    				'customer_id_old' => 'required',
    				'customer_id_new' => 'required|same:customer_id_old',
    				'reason'=>'required',
						'status'=>'required',
						'spr_id'=>'required',
    	];
    				$message = [
    									'customer_id_old.required'=>'The Field: Old Customer Must Choose',
											'customer_id_new.required'=>'The Field: New Customer Must Choose',
											'customer_id_new.same'=>'The Field: New Customer And Old Customer doesnt match',
											'reason.required'=>'The Field: Reason is Required',
											'status.required'=>'The Field: Status is Required',
											'spr_id.required'=>'The Field: SPR is Required'

    				];
    				$validator = Validator::make($input,$rules,$message);
   		if($validator->fails()){
    				return redirect()->route('change-name.add')->withErrors($validator)->withInput();
    	}else{
    				$change_name = new change_name();
						$change_name->customer_id_old = Input::get('customer_id_old');
						$change_name->customer_id_new = Input::get('customer_id_new');
						$change_name->reason 					= Input::get('reason');
						$change_name->status 					= Input::get('status');
						$change_name->spr_id 					= Input::get('spr_id');
						$change_name->save();
						return redirect()->route('change-name.add')->with('success','Data berhasi disimpan !');
			}

    }

    public function getEditChangename($id)
    {
    	$edit = change_name::where('id',$id)->first();
    	return view('page.perubahan data.editchangename',compact('edit'));
    }


    public function postUpdateChangename(Request $request, $id)
    {
    	$input = Input::all();
    	$rules = [
    				'customer_id_old' => 'required',
    				'customer_id_new' => 'required',
    				'reason'=>'required',
						'status'=>'required',
						'spr_id'=>'required',
    	];
    				$message = [
    									'customer_id_old.required'=>'The Field: Old Customer Must Choose',
											'customer_id_new.required'=>'The Field: New Customer Must Choose',
											'reason.required'=>'The Field: Reason is Required',
											'status.required'=>'The Field: Statu is Required',
											'spr_id.required'=>'The Field: SPR is Required'
    				];
    				$validator = Validator::make($input,$rules,$message);

    	if($validator->fails()){
    				return redirect()->route('change-name.add')->withErrors($validator)->withInput();
    	}else{
    				$change_name = change_name::where('id',$id)->first();
						$change_name->customer_id_old = Input::get('customer_id_old');
						$change_name->customer_id_new = Input::get('customer_id_new');
						$change_name->reason 					= Input::get('reason');
						$change_name->status 					= Input::get('status');
						$change_name->spr_id 					= Input::get('spr_id');
						$change_name->update();

						alert()->success('Data berhasil diupdate !');
						return redirect()->route('change-name.view',$id);
			}

    }


    public function getHapusChangename($id)
    {
    	$changename = change_name::where('id')->first();
    	$changename->delete();
    	alert()->success('Data berhasil dihapus !');
    	return redirect()->route('change-name.view');
    }

    /*    Move Kavling    */
    public function getMovekavling(){
			return view('page.perubahan data.movekavling');
    }

    public function getMovekavlingdata(){
    	$movekavling = moving_kavling::all();
    	return Datatables::of($movekavling)
    				->addColumn('action',function($movekavling){
	    						return
	    						'<a href="movekavling/edit/'.$movekavling->id.'" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
									 </a>
	    						 <a href="movekavling/hapus/'.$movekavling->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true" id="confirm"></i> Hapus
									 </a>';
    					})
    				->editColumn('status',function($movekavling){
    						if($movekavling->status == "Approved"){
    							return '<span class="label label-primary">'.$movekavling->status.'</span>';
    						}elseif($movekavling->status == "Rejected"){
    							return '<span class="label label-danger">'.$movekavling->status.'</span>';
    						}
    					})
    				->make(true);
    }

    public function getAddMovekavling(){
    	$kavling_from = kavling::all();
    	$kavling_to = kavling::where('status','=','Open')->get();
			return view('page.perubahan data.addmovekavling',compact('kavling_from','kavling_to'));
    }

    public function postAddMovekavling(Request $request){
    	$input = Input::all();
    	$rules = [
    			'kavling_from' => 'required',
    			'kavling_to' => 'required',
    			'reason' => 'required',
    			'status' => 'required',
    			'spr_id' => 'required'
    	];
    	$message = [
    								'kavling_from.required' => 'The Field: From Kavling must choose',
    								'kavling_to.required' => 'The Field: To Kavling must choose',
    								'reason.required' => 'The Field: Reason is required',
    								'status.required' => 'The Field: Status is required',
    								'spr_id.required' => 'The Field: SPR is required'
    	];
    				$validator = Validator::make($input,$rules,$message);

    	if($validator->passes()){

    				$movekavling = new moving_kavling();
    				$movekavling->kavling_from = Input::get('kavling_from');
    				$movekavling->kavling_to 	 = Input::get('kavling_to');
    				$movekavling->reason 			 = Input::get('reason');
    				$movekavling->status 			 = Input::get('status');
    				$movekavling->spr_id  		 = Input::get('spr_id');
    				$movekavling->save();

    				return redirect()->route('movekavling.add')->with('success','Data berhasil disimpan !');
    	}else{
    				return redirect()->route('movekavling.add')->withErrors($validator)->withInput();
    	}

    }

    public function getEditMovekavling($id){
    	$movekavling = moving_kavling::where('id',$id)->first();
			return view('page.perubahan data.editmovekavling');
    }

    public function postUpdateMovekavling(Request $request,$id){
    	$input = Input::all();
    	$rules = [
    			'kavling_from' => 'required',
    			'kavling_to' => 'required',
    			'reason' => 'required',
    			'status' => 'required',
    			'spr_id' => 'required'
    	];
    	$message = [
    								'kavling_from.required' => 'The Field: From Kavling must choose',
    								'kavling_to.required' => 'The Field: To Kavling must choose',
    								'reason.required' => 'The Field: Reason is required',
    								'status.required' => 'The Field: Status is required',
    								'spr_id.required' => 'The Field: SPR is required'
    	];
    				$validator = Validator::make($input,$rules,$message);

    	if($validator->passes()){

    				$movekavling = moving_kavling::where('id',$id)->first();
    				$movekavling->kavling_from = Input::get('kavling_from');
    				$movekavling->kavling_to 	 = Input::get('kavling_to');
    				$movekavling->reason 			 = Input::get('reason');
    				$movekavling->status 			 = Input::get('status');
    				$movekavling->spr_id  		 = Input::get('spr_id');
    				$movekavling->update();

    				alert()->success('Data berhasil diupdate !');
    				return redirect()->route('movekavling.view',$id);
    	}else{
    				return redirect()->route('movekavling.add')->withErrors($validator)->withInput();
    	}

    }

    public function getHapusMovekavling($id){
	    	$movekavling = moving_kavling::where('id',$id)->first();
	    	$movekavling->delete();
	    	alert()->success('Data berhasil dihapus !');
	    	return redirect()->route('movekavling.view',$id);
    }


    public function getCustomervoid(){
         return view('page.perubahan data.customervoid');
    }

   public function getCustomervoiddata(){
   		$customervoid = customer_void::all();
   		return Datatables::of($customervoid)
   			->addColumn('action',function($customervoid){
   					return
   					'<a href="movekavling/edit/'.$customervoid->id.'" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
						 </a>
						 <a href="movekavling/hapus/'.$customervoid->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-
						 	hidden="true" id="confirm"></i> Hapus
						 </a>';
   			})
   			->editColumn('customer_id',function($customervoid){
   					$nama = customer::where('id',$customervoid->customer_id)->first();
   					return $nama->first_name." ".$nama->last_name;
   			})
   			->make(true);

   }

    public function getAddCustomervoid(){
        $customervoid = moving_kavling::all();
            return view('page.perubahan data.addcustomervoid',compact('customervoid'));
    }

}
