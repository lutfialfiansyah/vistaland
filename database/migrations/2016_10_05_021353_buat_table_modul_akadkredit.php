<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulAkadkredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpr_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place');
            $table->date('date');
        });
        Schema::create('kpr_status_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('kpr_status_id');
            $table->foreign('kpr_status_id')->references('id')->on('kpr_status')->onDelete('CASCADE');
            $table->unsignedInteger('kpr_id');
            $table->foreign('kpr_id')->references('id')->on('KPR')->onDelete('CASCADE');
        });
        Schema::create('safekeeping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disbursement_value');
            $table->string('ajb');
            $table->string('imb');
            $table->string('split_certificate');
            $table->string('transfer_of_title');
            $table->string('electricity');
            $table->string('bestek');
            $table->string('cuts_debt');
            $table->string('status');
            $table->unsignedInteger('kpr_id');
            $table->foreign('kpr_id')->references('id')->on('KPR')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kpr_status');
        Schema::drop('kpr_status_detail');
        Schema::drop('safekeeping');
    }
}
