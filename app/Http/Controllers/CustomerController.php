<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\customer;
use App\siteplan;
use Datatables;

class CustomerController extends Controller
{
  public function getCustomer(){
    return view('page.booking.customer');
}
  public function getAddCustomer(){
    return view('page.booking.addcustomer');
  }

}
