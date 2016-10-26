<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spr extends Model
{
    protected $table = "spr";
    protected$fillable = ['move_status','change_name_status','type','memo','image','status','bf_id'];

    public function bf()
    {
      return $this->belongsTo('App\bf','bf_id');
    }

    public function moving_kavling()
    {
      return $this->hasOne('App\moving_kavling','spr_id');
    }

    public function customer_void()
    {
      return $this->hasOne('App\customer_void','spr_id');
    }

    public function change_name()
    {
      return $this->hasOne('App\change_name','spr_id');
    }

    public function cash()
    {
      return $this->hasOne('App\cash','spr_id');
    }

    public function kpr()
    {
    	return $this->hasOne('App\kpr','spr_id');
    }

  public $timestamps = false;

}
