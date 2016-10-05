string<?php

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
            $table->string('family_card');
            $table->string('marriage_certificate');
            $table->string('divorce_paper');
            $table->string('employment_certificate');
            $table->string('employment_certificate_expired');
            $table->string('pay_slip');
            $table->string('pay_slip_expired');
            $table->string('npwp');
            $table->string('saving_book');
            $table->string('btn_form');
            $table->string('bi_checking_status');
            $table->string('missing_data_memo');
            $table->string('mk_value');
            $table->string('sp3k');
            $table->string('down_payment_deviation');
            $table->string('bank_status');
            $table->string('memo');
            $table->string('interview_attempt');
            $table->string('appeal_status');
            $table->string('kpr_reviewed_status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE'); 
        });
        Schema::create('cash', function (Blueprint $table) {
            $table->increments('id');
            $table->string('family_card');
            $table->string('marriage_certificate');
            $table->string('divorce_paper');
            $table->string('npwp');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE'); 
        });
        Schema::create('interview', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place');
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

    /**string
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

























