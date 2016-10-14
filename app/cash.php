<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cash extends Model
{
    protected $table = "cash";
    protected $fillable = [
    	'family_card','marriage_certificate','divorce_paper','npwp','spr_id'
    ];

    public function payment(){
    	return $this->hasOne('App\payment','transaction_id');
    }

    public function spr(){
    	return $this->belongTo();
    }

	public $timestamps = false;
}
