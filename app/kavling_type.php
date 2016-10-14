<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kavling_type extends Model
{
    protected $table = "kavling_type";
    protected $fillable = [
    	'type','description'
    ];
	
    public function kavling(){
    	return $this->hasOne('App\kavling','kavling_type_id');
    }

    public function kavling_image(){
    	return $this->hasMany('App\kavling_image','house_type_id');
    }

    public function price(){
        return $this->hasOne('App\price','kavling_type_id');
    }

	public $timestamps = false;
}
