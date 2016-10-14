<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class change_name extends Model
{
    protected $table = "change_name";
    protected $fillable = [
    	'customer_id_old','customer_id_name','reason','status','spr_id'
    ];

    public function payment(){
    	return $this->hasOne('App\payment','customer_id');
    }

    public function spr(){
    	
    }

    public $timestamps = false; 
}
