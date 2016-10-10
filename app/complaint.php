<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    protected $table = "complaint";
    protected $fillable = [
    	'memo','status','finish_date','pic','kavling_id'
    ];
	
    public function kavling(){
    	return $this->belongsTo('App\kavling','kavling_id');
    }

	public $timestamps = false;
}
