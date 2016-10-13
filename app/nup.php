<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nup extends Model
{
	protected $table = "nup";
	protected $fillable = ['phone','customer_id'];
	
	public function customer(){
		return $this->belongsTo('App\customer','customer_id');
	}
	public function bf(){
		return $this->hasOne('App\nup','nup_id')
	}
	public $timestamps = false;
}
