<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulPerubahandata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_name', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id_old');
            $table->integer('customer_id_name');
            $table->varchar('reason');
            $table->varchar('status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE');
        });

        Schema::create('moving_kavling', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('kavling_from');
            $table->varchar('kavling_to');
            $table->varchar('reason');
            $table->varchar('status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE');
        });

        Schema::create('costumer_void', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
            $table->varchar('reason');
            $table->varchar('status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('change_name');
        Schema::drop('moving_kavling');
        Schema::drop('customer_void');
    }
}
