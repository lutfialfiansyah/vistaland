<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class priority extends Model
{
    protected $table = "priority";
    protected $fillable = ['name'];

    public function priority_detail(){
      return $this->hasMany('App\priority_detail','priority_id');
    }
    public $timestamps = false;
}
