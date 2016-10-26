<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interview extends Model
{
    protected $table = "interview";
    protected $fillable = ['place','date'];
    public $timestamps = false;
}
