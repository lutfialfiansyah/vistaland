<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class priority_detail extends Model
{
    protected $table = "priority_detail";
    protected $fillable = ['customer_id','priority_id'];

    public function priority(){
    	return $this->belongsTo('App\priority','priority_id');
    }
    public function customer(){
    	return $this->belongsTo('App\customer','priority_status');
    }

    public $timestamps = false;
}
