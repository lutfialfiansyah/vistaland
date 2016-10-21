<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\change_name;
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
    	return view('page.perubahan data.addchangename');
    }

    public function postAddChangename(Request $request)
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
    				$change_name = new change_name();
						$change_name->customer_id_old = Input::get('');
						$change_name->customer_id_new = Input::get('');
						$change_name->reason = Input::get('');
						$change_name->status = Input::get('');
						$change_name->spr_id = Input::get('');
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
						$change_name->customer_id_old = Input::get('');
						$change_name->customer_id_new = Input::get('');
						$change_name->reason = Input::get('');
						$change_name->status = Input::get('');
						$change_name->spr_id = Input::get('');
						$change_name->update();
						return redirect()->route('change-name.view')->with('success','Data berhasi disimpan !');
			}
    }


    public function getHapusChangename($id)
    {
    	$changename = change_name::where('id')->first();
    	$changename->delete();
    	alert()->success('Data berhasil dihapus !');
    	return redirect()->route('change-name.view');
    }
}
