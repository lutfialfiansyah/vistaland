<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\project;
use App\kavling;
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
    			return '<a class="btn thumbnail"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:50px;color:black;"></i></a>'; 		
    		})
            ->addColumn('action',function($project){
                return
                '<a href="project/edit/'.$project->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="#" class="btn btn-xs btn-success"><i class="fa fa-users" aria-hidden="true"></i> Authorized user</a>
                 <a href="project/'.$project->id.'/kavling" class="btn btn-xs btn-info"><i class="fa fa-home" aria-hidden="true"></i> Kavling</a>
                 <a href="#" class="btn btn-xs btn-warning"><i class="fa fa-money" aria-hidden="true"></i> Price List</a>
                 <a href="project/hapus/'.$project->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus project '. $project->name.' ?\')">
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
			'name'=>'required|min:3',
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
    	$project = project::find($id);
    	$project->delete();
    	alert()->success('Data berhasil dihapus !');
    	return redirect()->route('project.view');
    }

    public function postUpdateProject(Request $request,$id){
    	$this->validate($request,[
			'name' => 'required|unique:project,name',
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
<<<<<<< HEAD
		  $project->area = $request->input('area');
		  $project->unit_total = $request->input('unit_total');
		  $project->location = $request->input('location');
		  $project->booking_free = $request->input('booking_free');
		  $project->booking_comission = $request->input('booking_comission');
		  $project->nup_free = $request->input('nup_free');
  		$project->nup_comission = $request->input('nup_comission');
=======
		$project->area = $request->input('area');
		$project->unit_total = $request->input('unit_total');
		$project->location = $request->input('location');
		$project->booking_free = $request->input('booking_free');
		$project->booking_comission = $request->input('booking_comission');
		$project->nup_free = $request->input('nup_free');
  		$project->nup_comission = $request->input('nup_comission');  	
>>>>>>> de606b0507fd068b06f1285055690a0318924d83
  		$project->akad_comission = $request->input('akad_comission');
  		$project->update();
  		alert()->success('Data berhasil diupdate !');
  		return redirect()->route('project.view');

    }

    ///// kavling
    ///

    public function getAddKavling(){
    	$s_kavling_type = kavling_type::all();
    	$s_strategic_type = strategic_type::all();
    	return view('page.project.addkavling',compact('s_kavling_type','s_strategic_type'));
    }

    public function getKavling($id){
    	$project= project::where('id','=',$id)->first();
        return view('page.project.kavling',compact('project'));
    }

    public function getKavlingdata($id){
    	$kavling = kavling::all()->where('project_id','=',$id);
    	return Datatables::of($kavling)
            ->addColumn('action',function($kavling){
                return
                '<a href="project/edit/" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="project/hapus/" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus kavling '. $kavling->number.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              	})
            ->editColumn('status',function($kavling){
            	return "<span class='btn btn-xs btn-primary'>$kavling->status</span>";
            	})
             ->editColumn('progress',function($kavling){
            	return "<span class='btn btn-xs btn-success'>$kavling->progress</span>";
            	})
            ->make(true);

    }

    public function postAddKavling(Request $request){
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
    	$kavling->project_id = 2;
    	$kavling->save();
		alert()->success('Data berhasil disimpan !');
		return redirect()->back();

    }


}
