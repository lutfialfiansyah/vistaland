<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class strategic_type extends Model
{
    protected $table = "strategic_type";
    protected $fillable = [
    	'type'
    ];
	
    public function kavling(){
    	return $this->hasOne('App\kavling','strategic_type_id');
    }

	public $timestamps = false;
}
