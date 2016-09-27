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

    	if(Auth::attempt(['name' => $request->input('username'), 'password' => $request->input('password')])){
    		return redirect()->to('/home');
    	}
    	return redirect()->back();
    }

    public function getHome(){
    	$date = date('Y');
    	return view('page.dashboard',compact('date'));
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->to('/');
    }

}
