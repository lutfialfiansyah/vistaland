<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class strategic_type_price extends Model
{
    protected $table = "strategic_type_price";
    protected $fillable = [
    	'strategic_type_id','project_id','price'
    ];
	
    public function project(){
    	return $this->belongsTo('App\project','project_id');
    }

	public $timestamps = false;
}
