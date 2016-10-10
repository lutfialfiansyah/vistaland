<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tax_payment extends Model
{
    protected $table = "tax_payment";
    protected $fillable = [
    	'spp_total','bphtb_total','kavling_id'
    ];
	
    public function project(){
    	return $this->belongsTo('App\kavling','kavling_id');
    }

	public $timestamps = false;
}
