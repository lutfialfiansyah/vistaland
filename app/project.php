<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = "project";
    protected $fillable = [
    	'name','company','area','unit_total','location','booking_free','booking_comission','nup_free','nup_comission','akad_comission'
    ];

    public function siteplan(){
		return $this->hasMany('App\siteplan','project_id');
	}

	public function kavling(){
		return $this->hasMany('App\kavling','project_id');
	}

	public function strategic_type_price(){
		return $this->hasMany('App\strategic_type_price','project_id');
	}

	public function price(){
		return $this->hasMany('App\price','project_id');
	}
	public function nup(){
		return $this->belongsTo('App\nup','project_id');
	}
	public $timestamps = false;

}

