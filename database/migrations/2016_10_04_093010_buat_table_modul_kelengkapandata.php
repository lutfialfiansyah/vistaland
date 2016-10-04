<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulKelengkapandata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KPR', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('family_card');
            $table->varchar('marriage_certificate');
            $table->varchar('divorce_paper');
            $table->varchar('employment_certificate');
            $table->varchar('employment_certificate_expired');
            $table->varchar('pay_slip');
            $table->varchar('pay_slip_expired');
            $table->varchar('npwp');
            $table->varchar('saving_book');
            $table->varchar('btn_form');
            $table->varchar('bi_checking_status');
            $table->varchar('missing_data_memo');
            $table->varchar('mk_value');
            $table->varchar('sp3k');
            $table->varchar('down_payment_deviation');
            $table->varchar('bank_status');
            $table->varchar('memo');
            $table->varchar('interview_attempt');
            $table->varchar('appeal_status');
            $table->varchar('kpr_reviewed_status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE'); 
        });
        Schema::create('cash', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('family_card');
            $table->varchar('marriage_certificate');
            $table->varchar('divorce_paper');
            $table->varchar('npwp');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE'); 
        });
        Schema::create('interview', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('place');
            $table->date('date');
        });
        Schema::create('interview_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kpr_id');
            $table->foreign('kpr_id')->references('id')->on('KPR')->onDelete('CASCADE');
            $table->unsignedInteger('interview_id');
            $table->foreign('interview_id')->references('id')->on('interview')->onDelete('CASCADE');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('KPR');
        Schema::drop('cash');
        Schema::drop('interview');
        Schema::drop('interview_detail');
    }
}
