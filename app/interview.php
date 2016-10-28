<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interview extends Model
{
    protected $table = "interview";
    protected $fillable = ['place','date','customer_id'];
		public $timestamps = false;

	public function customer(){
		return $this->belongsTo('App\customer','customer_id');
	}
}