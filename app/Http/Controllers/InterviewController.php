<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Datatables;
use App\interview;
use App\customer;
class InterviewController extends Controller
{
public function getInterview(){
    	$interview= interview::all();
        return view('page.akadkredit.interview',compact('interview'));
    }

    public function getInterviewdata(){
    	$interview = interview::all();
    	return Datatables::of($interview)
            ->addColumn('action',function($interview){
                return
                '<a href="interview/detail/'.$interview->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
                <a href="#" class="btn btn-xs btn-default"><i class="fa fa-envelope" aria-hidden="true"></i>Send Email</a>
                <a href="interview/edit/'.$interview->id.'" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="interview/hapus/'.$interview->id.'" class="btn btn-xs btn-danger" id="delete-btn">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>';
              })
            ->make(true);

    }

    public function getAddInterview(){
        $interview = customer::all();
    	return view('page.akadkredit.addinterview',compact('interview'));
    }
    public function postAddInterview(Request $request){
        $this->validate($request,[
            'place'=>'required|min:3',
            'date'=>'required|min:3|unique:interview,date',
            ]);
            $interview = new interview();
        $interview->place = $request->input('place');
        $interview->date = $request->input('date');
        $interview->customer_id = $request->input('customer');
        $interview->save();
      alert()->success('Data berhasil disimpan !')->autoclose(2000);
      return redirect()->route('interview.view');
        }
    public function postUpdateInterview(Request $request,$id){
        $this->validate($request,[
            'place'=>'required|min:3',
            'date'=>'required|min:3',
            ]);
        $interview = interview::where('id',$id)->first();
        $interview->place = $request->input('place');
        $interview->date = $request->input('date');
        $interview->customer_id = $request->input('customer');
        $interview->update();
      alert()->success('Data berhasil diubah !')->autoclose(2000);
      return redirect()->route('interview.view');
        }
    public function getEditInterview($id){
        $interview = customer::all();
        $edit = interview::where('id',$id)->first();
        return view('page.akadkredit.editinterview',compact('edit','interview'));
    }
    public function getDetailInterview($id){
        $interview = customer::all();
      $detailinterview = interview::where('id',$id)->first();
      return view('page.akadkredit.detailinterview',compact('detailinterview','interview'));
    }
    public function getHapusInterview($id){
        $interview = interview::find($id);
        $interview->delete();
        alert()->success('Data berhasil dihapus !')->autoclose(3000);
        return redirect()->route('interview.view');
    }
}
