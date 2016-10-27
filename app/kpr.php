<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kpr extends Model
{
    protected $table = "kpr";
    protected $fillable = [
    	'family_card','marriage_certificate','divorce_paper','employment_certificate','employment_certificate_expired','pay_slip','pay_slip_expired','npwp','saving_book','btn_form','bi_checking_status','missing_data_memo','mk_value','sp3k','down_payment_deviation','bank_status','memo','interview_attempt','appeal_status','kpr_reviewed_status','spr_id'
    ];

    public function spr(){
    	return $this->belongTo('App\spr','spr_id');
    }

	public $timestamps = false;
}
