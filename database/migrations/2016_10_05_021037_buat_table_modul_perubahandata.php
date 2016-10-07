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
            $table->string('reason');
            $table->string('status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE');
        });

        Schema::create('moving_kavling', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kavling_from');
            $table->string('kavling_to');
            $table->string('reason');
            $table->string('status');
            $table->unsignedInteger('spr_id');
            $table->foreign('spr_id')->references('id')->on('SPR')->onDelete('CASCADE');
        });

        Schema::create('customer_void', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
            $table->string('reason');
            $table->string('status');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Schema::drop('change_name');
            Schema::drop('moving_kavling');
            Schema::drop('customer_void');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

