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
            $table->varchar('place');
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
            $table->varchar('disbursement_value');
            $table->varchar('ajb');
            $table->varchar('imb');
            $table->varchar('split_certificate');
            $table->varchar('transfer_of_title');
            $table->varchar('electricity');
            $table->varchar('bestek');
            $table->varchar('cuts_debt');
            $table->varchar('status');
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
