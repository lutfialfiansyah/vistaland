<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\Http\Requests;

class BookingController extends Controller
{
	 public function getCustomer(){
        return view('page.booking.customer');
    }
		public function getAddCustomer(){
			return view('page.booking.addcustomer');
		}
		
}
