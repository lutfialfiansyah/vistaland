<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = "payment";
    protected $fillable = [
    	'total','method','description','bank_reference','type','transaction_id','customer_id'
    ];

    public function customer(){
    	return $this->belongsTo('App\customer','customer_id');
    }

    // public function moving_kavling(){

    // }

    public function change_name(){
    	return $this->belongsTo('App\change_name','customer_id');
    }

    public function cash(){
    	return $this->belongsTo('App\cash','transaction_id');
    }

	public $timestamps = false;

}
