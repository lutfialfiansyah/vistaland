<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = "project";
    protected $fillable = [
    	'name','company','area','unit_total','location','booking_free','booking_comission','nup_free','nup_comission','akad_comission'
    ];

     public $timestamps = false;
}
