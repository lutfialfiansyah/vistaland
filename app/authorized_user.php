<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class authorized_user extends Model
{
    protected $table = "authorized_user";
    protected $fillable = [
    			'project_manager','project_manager_assistant','finance_spv','inhouse_spv','field_executive','admin','legal','project_id'
    ];

    public function project(){
			return $this->belongsTo('App\project','project_id');
		}

		public $timestamps = false;
}
