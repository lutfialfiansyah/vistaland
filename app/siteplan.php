<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siteplan extends Model
{
    protected $table = "siteplan";
    protected $fillable = [
    	'image','project_id'
    ];
	
    public function project(){
    	return $this->belongsTo('App\project','project_id');
    }

	public $timestamps = false;
}
