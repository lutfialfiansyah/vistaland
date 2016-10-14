<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bf extends Model
{
    protected $table = "bf";
    protected $fillable = ['comission_status','nup_id','kavling_id','promo_id'];

    public function nup(){
    	return $this->belongsTo('App\nup','nup_id');
    }

    public function kavling(){
    	return $this->belongsTo('App\kavling','kavling_id');
    }

    public function promo(){
    	return $this->belongsMany('App\promo','promo_id');
    }

    public function payment(){

    }

    public function spr(){
    	
    }

}
