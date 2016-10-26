<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class official extends Model
{
    protected $table = "official";
    protected $fillable = [
    	'name','email','status','role'
    ];

	public $timestamps = false;
}
