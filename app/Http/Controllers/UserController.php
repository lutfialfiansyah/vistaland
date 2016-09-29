<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;

class UserController extends Controller
{
	
    public function getLogin(){
    	return view('page.login');
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
    	return redirect()->to('/login');
    }

}
