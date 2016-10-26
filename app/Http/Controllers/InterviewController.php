<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Datatables;
use App\interview;

class InterviewController extends Controller
{
public function getInterview(){
    	$interview= interview::all();
        return view('page.akadkredit.interview',compact('interview'));
    }

    public function getInterviewdata(){
    	$interview = interview::all();
    	return Datatables::of($interview)
    		->addColumn('image',function($interview){
    			return '<a href="project/siteplan/'.$interview->id.'" class="btn thumbnail"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:50px;color:black;"></i></a>';
    		})
            ->addColumn('action',function($interview){
                return
                '<a href="project/edit/'.$interview->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="#" class="btn btn-xs btn-success"><i class="fa fa-users" aria-hidden="true"></i> Authorized user
                 </a>
                 <a href="project/'.$interview->id.'/kavling" class="btn btn-xs btn-info"><i class="fa fa-home" aria-hidden="true"></i> Kavling</a>
                 <a href="project/'.$interview->id.'/pricelist" class="btn btn-xs btn-warning"><i class="fa fa-money" aria-hidden="true"></i> Price List</a>
                 <a href="project/hapus/'.$interview->id.'" class="btn btn-xs btn-danger" id="confirm">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);

    }

    public function getAddInterview(){
    	return view('page.akadkredit.addinterview');
    }
    

}
