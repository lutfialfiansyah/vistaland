<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kavling_image extends Model
{
    protected $table = "kavling_image";
    protected $fillable = [
    	'image','house_type_id'
    ];
	
    public function kavling(){
    	return $this->belongsTo('App\kavling_type','house_type_id');
    }

	public $timestamps = false;
}
