<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_void extends Model
{
    protected $table = "customer_void";
    protected $fillable = [
    	'customer_id','reason','status','spr_id'
    ];

    public function spr(){
    	return $this->belongsTo('App\spr','spr_id');
    }

	public $timestamps = false;
}
