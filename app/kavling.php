<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kavling extends Model
{
    protected $table = "kavling";
    protected $fillable = [
    	'number','field_size','bpn_size','left_over_size','Imb_parent','Imb_parent_date','Imb_fraction','Imb_fraction_date',
    	'pbb','pln_no','status','progress','strategic_type_id','project_id','kavling_type_id'
    ];
	
    public function project(){
    	return $this->belongsTo('App\project','project_id');
    }

    public function strategic_type(){
    	return $this->belongsTo('App\strategic_type','strategic_type_id');
    }

    public function kavling_type(){
    	return $this->belongsTo('App\kavling_type','kavling_type_id');
    }

    public function complaint(){
    	return $this->hasMany('App\complaint','kavling_id');
    }

     public function tax_payment(){
        return $this->hasOne('App\tax_payment','kavling_id');
    }

	public $timestamps = false;

}
