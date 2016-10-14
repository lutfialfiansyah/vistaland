<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = "payment";
    protected $fillable = ['total','method','description','bank_reference','type','transaction_id','customer_id'];

}
