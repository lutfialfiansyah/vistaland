<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
    protected $table = "promo";
    protected $fillable = [
    	'name','date_start','date_end','discount','agent_bonus','team_bonus'
    ];

    public function bf(){
    	return $this->hasOne('App\bf','promo_id');
    }

    public $timestamps = false; 
}
