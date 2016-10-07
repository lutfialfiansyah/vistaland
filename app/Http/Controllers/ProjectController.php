<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\project;
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
            ->addColumn('action',function($project){
                return
                '<a href="project/edit/'.$project->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
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
			'area'=>'required|numeric|min:0|max:30|',
			'unit_total'=>'required|numeric',
			'location'=>'required',
			'booking_free'=>'required|numeric',
			'booking_comission'=>'required|numeric',
			'nup_free'=>'required|numeric',
			'nup_comission'=>'required|numeric',
			'akad_comission'=>'required|numeric',
    	]);
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
  		$project->akad_comission = $request->input('akad_comission');
  		$project->update();
  		alert()->success('Data berhasil diupdate !');
  		return redirect()->route('project.view');
  		
    }

}
