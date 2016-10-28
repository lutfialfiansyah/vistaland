<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\nup;
use App\kavling;
use Response;

class AjaxController extends Controller
{

	public function getKavlingnup(Request $request){
			$nup = $request->input('nup');
			$nup = nup::where('id','=',$nup)->first();
			$kavling = kavling::where('project_id',$nup->project_id)->join('project','kavling.project_id','=','project.id')->select('kavling.id as id','project.name as name','kavling.number as number')->get();
			return Response::json($kavling);
	}

	public function getcodenup(Request $request){
		$nup = $request->input('nup');
		$code = nup::where('id','=',$nup)->first();
		return Response::json($code);
	}

}
