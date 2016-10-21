<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use App\project;
use App\kavling;
use App\price;
use App\promo;
use App\kavling_type;
use App\strategic_type;
use App\siteplan;
use Datatables;



class ProjectController extends Controller
{

    public function getProject(){
    	$project= project::all();
        return view('page.project.project',compact('project'));
    }
    public function getProjectdata(){
    	$project = project::all();
    	return Datatables::of($project)
    		->addColumn('image',function($project){
    			return '<a href="project/siteplan/'.$project->id.'" class="btn thumbnail"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:50px;color:black;"></i></a>';
    		})
            ->addColumn('action',function($project){
                return
                '<a href="project/edit/'.$project->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="#" class="btn btn-xs btn-success"><i class="fa fa-users" aria-hidden="true"></i> Authorized user
                 </a>
                 <a href="project/'.$project->id.'/kavling" class="btn btn-xs btn-info"><i class="fa fa-home" aria-hidden="true"></i> Kavling</a>
                 <a href="project/'.$project->id.'/pricelist" class="btn btn-xs btn-warning"><i class="fa fa-money" aria-hidden="true"></i> Price List</a>
                 <a href="project/hapus/'.$project->id.'" class="btn btn-xs btn-danger" id="confirm">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);

    }

    public function getAddProject(){
    	return view('page.project.addproject');
    }

    public function postAddProject(Request $request){
    	$this->validate($request,[
		  'name'=>'required|min:3|unique:project,name',
			'company'=>'required|min:3',
			'area'=>'required|numeric|min:0',
			'unit_total'=>'required|numeric|min:0',
			'location'=>'required',

    	]);
		       	$project = new project();
		        $project->name = $request->input('name');
		        $project->company = $request->input('company');
						$project->area = $request->input('area');
						$project->unit_total = $request->input('unit_total');
						$project->location = $request->input('location');
						$project->booking_free = $request->input('booking_free');
						$project->booking_comission = $request->input('booking_comission');
						$project->nup_free = $request->input('nup_free');
						$project->nup_comission = $request->input('nup_comission');
						$project->akad_comission = $request->input('akad_comission');
						$project->save();
				alert()->success('Data berhasil disimpan !');
				return redirect()->route('project.view');
    }

    public function getEditProject($id){
     	$edit = project::where('id',$id)->first();
    	return view('page.project.editproject',compact('edit'));
    }

    public function getHapusProject($id){
    	$kavling = kavling::where('project_id',$id);
    	$price = price::where('project_id',$id);
    	$project = project::find($id);
    	$kavling->delete();
    	$price->delete();
    	$project->delete();
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('project.view');
    }

    public function postUpdateProject(Request $request,$id){
    	$this->validate($request,[
			'name' => 'required',
			'company'=> 'required',
			'area'=> 'required|numeric|min:0',
			'unit_total'=> 'required|numeric|min:0',
			'location'=> 'required',
			'booking_free'=> 'required|numeric|min:0',
			'booking_comission'=> 'required|numeric|min:0',
			'nup_free'=> 'required|numeric|min:0',
			'nup_comission'=> 'required|numeric|min:0',
			'akad_comission'=> 'required|numeric|min:0',
    	]);

      	$project = project::where('id',$id)->first();
      	$project->name = $request->input('name');
      	$project->company = $request->input('company');

				$project->area = $request->input('area');
				$project->unit_total = $request->input('unit_total');
				$project->location = $request->input('location');
				$project->booking_free = $request->input('booking_free');
				$project->booking_comission = $request->input('booking_comission');
				$project->nup_free = $request->input('nup_free');
				$project->nup_comission = $request->input('nup_comission');
				$project->area = $request->input('area');
				$project->unit_total = $request->input('unit_total');
				$project->location = $request->input('location');
				$project->booking_free = $request->input('booking_free');
				$project->booking_comission = $request->input('booking_comission');
				$project->nup_free = $request->input('nup_free');
				$project->nup_comission = $request->input('nup_comission');
				$project->akad_comission = $request->input('akad_comission');
				$project->update();
				alert()->success('Data berhasil diupdate !');
				return redirect()->route('project.view');


    }


    public function getAddKavling($id){
    	$project = project::where('id',$id)->first();
    	$s_kavling_type = kavling_type::all();
    	$s_strategic_type = strategic_type::all();
    	return view('page.project.addkavling',compact('s_kavling_type','s_strategic_type','project'));
    }

    public function getKavling($id){
    	$project= project::where('id','=',$id)->first();
        return view('page.project.kavling',compact('project'));
    }

    public function getKavlingdata($id){
    	$kavling = kavling::all()->where('project_id','=',$id);
    	return Datatables::of($kavling)
    		->addColumn('type',function($kavling){
    			return $kavling->kavling_type->type;
    			})
    		->addColumn('price',function($kavling){
    			return "Rp.".number_format($kavling->kavling_type->price->price,2,',','.');
    			})
            ->addColumn('action',function($kavling){
                return
                '<a href="kavling/edit/'.$kavling->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="kavling/hapus/'.$kavling->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus kavling '. $kavling->number.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              	})
            ->editColumn('status',function($kavling){
            	return "<span class='label label-primary'>$kavling->status</span>";
            	})
             ->editColumn('progress',function($kavling){
            	return "<span class='label label-success'>$kavling->progress</span>";
            	})
            ->make(true);

    }

    public function postAddKavling(Request $request,$id){
    	$this->validate($request,[
    		'number'=>'required|numeric|unique:kavling,number',

    		'strategic_type_id'=>'required',
    		'field_size'=>'required|numeric',
    		'bpn_size'=>'required|numeric',
    		'left_over_size'=>'required|numeric',
    		'Imb_parent_date'=>'date',
    		'Imb_fraction_date'=>'date'
    	]);

    	$kavling = new kavling();
    	$kavling->number = $request->input('number');
    	$kavling->field_size = $request->input('field_size');
    	$kavling->bpn_size = $request->input('bpn_size');
    	$kavling->left_over_size = $request->input('left_over_size');
    	$kavling->Imb_parent = $request->input('Imb_parent');
    	$kavling->Imb_parent_date = $request->input('Imb_parent_date');
    	$kavling->Imb_fraction = $request->input('Imb_fraction');
    	$kavling->Imb_fraction_date = $request->input('Imb_fraction_date');
    	$kavling->pbb = $request->input('pbb');
    	$kavling->pln_no = $request->input('pln_no');
    	$kavling->status = $request->input('status');
    	$kavling->progress = $request->input('progress');
    	$kavling->strategic_type_id = $request->input('strategic_type_id');
    	$kavling->kavling_type_id = $request->input('kavling_type_id');
    	$kavling->project_id = $id;
    	$kavling->save();
		return back()->with('success','Data berhasil disimpan !')->autoclose(3000);

    }

    public function getEditKavling($id,$kav_id){
    	$s_kavling_type = kavling_type::all();
    	$s_strategic_type = strategic_type::all();
     	$edit = kavling::where('id','=',$kav_id,'and','project_id','=',$id)->first();
    	return view('page.project.editkavling',compact('edit','s_kavling_type','s_strategic_type'));
    }

    public function postUpdateKavling(Request $request,$id,$kav_id){
    	$this->validate($request,[
    		'number'=>'required|numeric',
    		'kavling_type_id'=>'required',
    		'strategic_type_id'=>'required',
    		'field_size'=>'required|numeric',
    		'bpn_size'=>'required|numeric',
    		'left_over_size'=>'required|numeric',
    		'Imb_parent_date'=>'date',
    		'Imb_fraction_date'=>'date'
    	]);

    	$kavling = kavling::where('id','=',$kav_id,'and','project_id','=',$id)->first();
    	$kavling->number = $request->input('number');
    	$kavling->field_size = $request->input('field_size');
    	$kavling->bpn_size = $request->input('bpn_size');
    	$kavling->left_over_size = $request->input('left_over_size');
    	$kavling->Imb_parent = $request->input('Imb_parent');
    	$kavling->Imb_parent_date = $request->input('Imb_parent_date');
    	$kavling->Imb_fraction = $request->input('Imb_fraction');
    	$kavling->Imb_fraction_date = $request->input('Imb_fraction_date');
    	$kavling->pbb = $request->input('pbb');
    	$kavling->pln_no = $request->input('pln_no');
    	$kavling->status = $request->input('status');
    	$kavling->progress = $request->input('progress');
    	$kavling->strategic_type_id = $request->input('strategic_type_id');
    	$kavling->kavling_type_id = $request->input('kavling_type_id');
    	$kavling->project_id = $id;
    	$kavling->update();
    	alert()->success('Data telah diperbaharui !')->autoclose(3000);
		return redirect()->route('kavling.view',$id);
	}

    public function getHapusKavling($id,$kav_id){
    	$kavling = kavling::where('id','=',$kav_id,'and','project_id','=',$id)->first();
    	$kavling->delete();
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('kavling.view',$id);
    }

    // Pricelist
    public function getPricelist($id){
    	$project= project::where('id','=',$id)->first();
        return view('page.project.pricelist',compact('project'));
    }

    public function getAddPricelist($id){
    	$project = project::where('id',$id)->first();
    	$s_kavling_type = kavling_type::all();
    	$s_strategic_type = strategic_type::all();
    	return view('page.project.addpricelist',compact('s_kavling_type','s_strategic_type','project'));
    }

    public function postAddPricelist(Request $request,$id){
    	$this->validate($request,[
    		'kavling_type_id'=>'required',
    		'expired_date'=>'required|date',
    		'price'=>'required|numeric|min:0',
    		'administration_price'=>'required|numeric|min:0',
    		'renovation_price'=>'required|numeric|min:0',
    		'left_over_price'=>'required|numeric|min:0',
    		'move_kavling_price'=>'required|numeric|min:0',
    		'change_name_price'=>'required|numeric|min:0',
    		'status'=>'required',
    	]);

    	$price = new price();
    	$price->kavling_type_id = $request->input('kavling_type_id');
    	$price->expired_date = $request->input('expired_date');
    	$price->price = $request->input('price');
    	$price->administration_price = $request->input('administration_price');
    	$price->renovation_price = $request->input('renovation_price');
    	$price->left_over_price = $request->input('left_over_price');
    	$price->move_kavling_price = $request->input('move_kavling_price');
    	$price->change_name_price = $request->input('change_name_price');
    	$price->management_confirm_status = $request->input('status');
    	$price->memo = $request->input('memo');
    	$price->project_id = $id;
    	$price->save();
    	alert()->success('Data berhasil disimpan !')->autoclose(3000);
		return redirect()->route('pricelist.view',$id);

    }

    public function getEditPricelist($id,$price_id){
    	$s_kavling_type = kavling_type::all();
     	$edit = price::where('id','=',$price_id,'and','project_id','=',$id)->first();
    	return view('page.project.editpricelist',compact('edit','s_kavling_type'));
    }

    public function postUpdatePricelist(Request $request,$id,$price_id){
    	$this->validate($request,[
    		'kavling_type_id'=>'required',
    		'expired_date'=>'required|date',
    		'price'=>'required|numeric|min:0',
    		'administration_price'=>'required|numeric|min:0',
    		'renovation_price'=>'required|numeric|min:0',
    		'left_over_price'=>'required|numeric|min:0',
    		'move_kavling_price'=>'required|numeric|min:0',
    		'change_name_price'=>'required|numeric|min:0',
    		'status'=>'required',
    	]);

    	$price = price::where('id','=',$price_id,'and','project_id','=',$id)->first();
    	$price->kavling_type_id = $request->input('kavling_type_id');
    	$price->expired_date = $request->input('expired_date');
    	$price->price = $request->input('price');
    	$price->administration_price = $request->input('administration_price');
    	$price->renovation_price = $request->input('renovation_price');
    	$price->left_over_price = $request->input('left_over_price');
    	$price->move_kavling_price = $request->input('move_kavling_price');
    	$price->change_name_price = $request->input('change_name_price');
    	$price->management_confirm_status = $request->input('status');
    	$price->memo = $request->input('memo');
    	$price->project_id = $id;
    	$price->update();
    	alert()->success('Data berhasil diperbaharui !')->autoclose(3000);
		return redirect()->route('pricelist.view',$id);
	}

	public function getHapusPricelist($id,$price_id){
    	$price = price::where('id','=',$price_id,'and','project_id','=',$id)->first();
    	$price->delete();
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('pricelist.view',$id);
    }

    // Siteplan
    public function getSiteplan($id){
    	$project= project::where('id','=',$id)->first();
        return view('page.project.siteplan',compact('project'));
    }
    public function getAddSiteplan($id){
    	$project = project::where('id',$id)->first();
    	$s_kavling_type = kavling_type::all();
    	$s_strategic_type = strategic_type::all();
    	return view('page.project.addsiteplan',compact('s_kavling_type','s_strategic_type','project'));
    }

    public function postAddSiteplan(Request $request,$id){
    			$siteplan = new siteplan();
					    	$file = $request->file('file');
					    	$filename = time().'.'.$file->getClientOriginalName();
					    	$path = public_path('image/'.$filename);
					    	Image::make($file->getRealPath())->resize(600,600)->save($path);

					  $siteplan->image = $filename;
					  $siteplan->project_id = $id;
					  $siteplan->save();
    }

     public function getEditSiteplan($id,$siteplan_id){
     	$edit = siteplan::where('id','=',$siteplan_id,'and','project_id','=',$id)->first();
    	return view('page.project.editsiteplan',compact('edit'));
    }

    public function postUpdateSiteplan(Request $request,$id,$siteplan_id){
    	$this->validate($request,[
    		'file'=>'image|mimes:jpeg,png,jpg'
    	]);
    	$update = siteplan::where('id','=',$siteplan_id,'and','project_id','=',$id)->first();
    	if(empty(Input::file('file'))){
    		$update->image = $update->image;
    		alert()->error('Update foto gagal !');
    	}else{
	    	$image = Input::file('file');
	        $namafile = time().'.'.$image->getClientOriginalExtension();
	        $path = public_path('image/'.$namafile);
	        Image::make($image->getRealPath())->resize(500,500)->save($path);

	        $update->image = $namafile;
	        alert()->success('Update foto berhasil !')->autoclose(3000);
    	}
    	$update->update();
    	return redirect()->route('siteplan.view',$id);

    }

    public function getHapusSiteplan($id,$siteplan_id){
    	$siteplan = siteplan::where('id','=',$siteplan_id,'and','project_id','=',$id)->first();
    	$siteplan->delete();
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('siteplan.view',$id);
    }

    public function getDropSiteplan($id){
    	$siteplan = siteplan::where('project_id','=',$id);
    	$siteplan->delete();
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('siteplan.view',$id);
    }

    // Promo
    public function getPromo(){
    	return view('page.project.promo');
    }

    public function getPromodata(){
    	$promo = promo::all();
    	return Datatables::of($promo)
    			->addColumn('action',function($promo){
    				return
    				'<a href="promo/edit/'.$promo->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
    				 <a href="promo/hapus/'.$promo->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus '.$promo->name.' ? \')">
    				 	<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus
    				 </a>';
    			})
    			->editColumn('discount',function( $promo){
    				return $promo->discount."%";
    			})
    			->make(true);

    }

    public function getAddPromo(){
    	return view('page.project.addpromo');
    }

    public function postAddPromo(Request $request){
    	$this->validate($request,[
    		'name'=>'required|unique:promo,name',
    		'date_start'=>'required|date',
    		'date_end'=>'required|date',
    		'discount'=>'required|numeric|min:0',
    		'agent_bonus'=>'required|numeric|min:0',
    		'team_bonus'=>'required|numeric|min:0'
    	]);
  	$promo = new promo();
  	$promo->name = $request->input('name');
		$promo->date_start = $request->input('date_start');
		$promo->date_end = $request->input('date_end');
		$promo->discount = $request->input('discount');
		$promo->agent_bonus = $request->input('agent_bonus');
		$promo->team_bonus = $request->input('team_bonus');
		$promo->save();
		return redirect()->route('promo.add')->with('success','Data berhasil disimpan !');
    }

    public function getEditPromo($id){
    	$edit = promo::where('id',$id)->first();
    	return view('page.project.editpromo',['edit' => $edit]);
    }

    public function postUpdatePromo(Request $request,$id){
    	$this->validate($request,[
    		'name' => 'required',
			'date_start' => 'required|date',
			'date_end' => 'required|date',
			'discount' => 'required|numeric|min:0',
			'agent_bonus' => 'required|numeric|min:0',
 			'team_bonus' => 'required|numeric|min:0',
    	]);

    $promo = promo::where('id',$id)->first();
		$promo->name = $request->input('name');
		$promo->date_start = $request->input('date_start');
		$promo->date_end = $request->input('date_end');
		$promo->discount = $request->input('discount');
		$promo->agent_bonus = $request->input('agent_bonus');
		$promo->team_bonus = $request->input('team_bonus');
		$promo->update();
		alert()->success('Data berhasil diperbaharui !')->autoclose(3000);
		return redirect()->route('promo.view');
    }

    public function getHapusPromo($id){
    	$promo = promo::where('id',$id)->first();
    	$promo->delete();
    	alert()->success('Data berhasil dihapus !')->autoclose(3000);
    	return redirect()->route('promo.view');
    }


}
