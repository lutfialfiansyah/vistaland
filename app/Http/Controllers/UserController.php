<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Datatables;
use SweetAlert;

class UserController extends Controller
{

    public function getLogin(){
    	return view('page.login');
    }
    public function getEdit(){
    	$user = User::all();
        return view('page.editprofile',compact('user'));
    }
    public function getEditdata(){
    	$user = User::all();
    	return Datatables::of($user)
            ->addColumn('action',function($user){
                return
                '<a href="editprofile/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="editprofile/hapus/'.$user->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus user '. $user->name.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);

    }
    public function postLogin(Request $request){
    	$this->validate($request,[
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	if(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])){
    		return redirect()->to('/');
    	}else{
    		return redirect()->to('/login')->with('pesanError','Maaf username atau password Anda salah');
    	}
    }

    public function getHome(){
    	return view('page.dashboard');
    }

    public function logout(){
    	Auth::logout();
        Alert()->success('You have been logged out.', 'Good bye!');
    	return redirect()->to('/login');
    }
    public function edit($id)
    {
        $tampiledit = User::where('id',$id)->first();
            return view('page.edituser')->with('tampiledit',$tampiledit);
    }

}
