<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Hashing;
use Illuminate\Session;
use Illuminate\Support\Facades\Input;
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
                '<a href="editprofile/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                 <a href="editprofile/hapus/'.$user->id.'" class="btn btn-xs btn-danger" onclick="return confirm(\'Hapus user '. $user->name.' ?\')">
                 <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                 ';
              })
            ->make(true);

    }
    public function postLogin(Request $request){
    	$this->validate($request,[
            alert()->warning('Enter your Username & Password !', 'Please')->persistent('Okey'),
    		'username' => 'required',
    		'password' => 'required',
             
        ]);
    	if(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])){

      	return redirect()->to('/');
    	}else{
            alert()->info('Username or Password is Incorrect !', 'Sorry')->persistent('Try again');
        return redirect()->to('/login')->with('pesanError','Maaf username atau password Anda salah');

        }
    }

    public function getHome(){
    	return view('page.dashboard');
    }

    public function logout(){
    alert()->info('You have been logged out.', 'Good bye!');
      Auth::logout();
      return redirect()->to('/login');
    	Auth::logout();

			alert()->success('You have been logged out.', 'Good bye!');
			return redirect()->to('/login');

    }
    public function edit($id)
    {
        $tampiledit = User::where('id',$id)->first();
            return view('page.edituser')->with('tampiledit',$tampiledit);
    }

    public function getlocked(){
       if(!Auth::check()){
            \Session::put('locked',true);

            return view('bagian.lockscreen');
       }
       return redirect('/login');
    }
    public function locked(){
        if(!Auth::check()){
            return redirect('/login');
        }

        $password = Input::get('password');

        if(\Has::check($password, Auth::user()->password)){
            \Session::forget('locked');
            return redirect('/');
        }

    }   

}
