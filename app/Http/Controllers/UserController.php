<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
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

    }
    public function getEditProfile()
    {
         return view('page.edituser');
    }

    public function postUpdateProfile(Request $request){
    	$input = Input::all();
    	$rules = [
    							'name' => 'required',
    							'email' => 'required',
    	];
    	$message = [
    		'name.required' => 'The Field: Name can not be null ',
    		'email.required' => 'The Field: Email can not be null '
    	];

    				$validator = Validator::make($input,$rules,$message);

    	if($validator->passes()){

    					$user = User::where('name','=',Auth::user()->name)->first();
    					$user->name = Input::get('name');
							$user->email = Input::get('email');
							$user->update();

							return redirect()->route('profile.view')->with('PesanSucces','Anda berhasil memperbaharui profile Anda !');
    	}else{

    					return redirect()->route('profile.view')->withErrors($validator)->withInput();
    	}

    }

    public function postChangepasswordProfile(){
    	$input = Input::all();
    	$rules = [
    				'oldpass' =>'required',
    				'newpass' =>'required',
    				'confirm' => 'required|confirmed'
    	];
    	$message = [
    								'oldpass.required'=>'The Field: Current Password is required',
    								'newpass.required'=>'The Field: New Password is required',
    								'confirm.required'=>'The Field: Confirm Password is required'
    	];

    			$validator = Validator::make($input,$rules,$message);

    			if($validator->passes()){

    					if(Input::get('oldpass') == Auth::user()->password){

				  				$user = User::where('name','=',Auth::user()->name)->first();
				  				$user->password = Input::get('');
				  				$user->update();

				  				return redirect()->route('profile.view')->with('PesanSucces','Change Password berhasi dilakukan !');
				  		}
    			}else{

    							return redirect()->route('profile.view')->withErrors($validator)->withInput();
    			}
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

