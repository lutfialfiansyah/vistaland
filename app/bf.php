<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bf extends Model
{
    protected $table = "bf";
    protected $fillable = ['comission_status','nup_id','kavling_id','promo_id'];

    public function nup(){
    	return $this->belongsTo('App\nup','id');
    }
}
