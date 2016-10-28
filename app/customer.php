<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";
    
    protected $fillable = [
    'first_name','last_name','ktp_number','ktp_expire','house_address',
    'office_address','email','house_phone','office_phone','relative_name','relative_phone',
    'relative_ktp','spouse_name','spouse_ktp','image','bank_account_number','btn-id',
    'btn_account_number','btn_branch','mk_application','deposit_loan_akad','status',
    'priority_status'];

    public function priority_detail(){
      return $this->hasMany('App\priority_detail','customer_id');
    } 
    public function nup(){
      return $this->hasOne('App\nup','customer_id');
    }
    public function payment(){
        return $this->hasOne('App\payment','customer_id');
    }
    public function interview(){
        return $this->hasOne('App\interview','customer_id');
    } 
    public $timestamps = true;
}
