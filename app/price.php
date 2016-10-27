<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class price extends Model
{
    protected $table = "price";
    protected $fillable = [
    	'expired_date','price','administation_price','renovation_price','left_over_price','move_kavling_price',
    	'change_name_price','management_confirm_status','memo','project_id','kavling_type_id'
    ];

    public function kavling_type(){
    	return $this->belongsTo('App\kavling_type','kavling_type_id');
    }

    public function project(){
    	return $this->belongsTo('App\project','project_id');
    }
    public function price(){
    	return $this->hasOne('App\kavling','price_id');
    }

	public $timestamps = false;
}
