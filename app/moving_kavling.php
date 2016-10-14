<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moving_kavling extends Model
{
    protected $table = "moving_kavling";
    protected $fillable = [
    	'kavling_from','kavling_to','reason','status','spr_id'
    ];

    public function payment(){
    	
    }
 
    public function spr()
    {
      return $this->belongsTo('App\spr','spr_id');
    }

}
