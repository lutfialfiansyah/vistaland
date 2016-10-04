<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company');
            $table->string('area');
            $table->string('unit_total');
            $table->string('location');
            $table->string('booking_free');
            $table->string('booking_comission');
            $table->string('nup_free');
            $table->string('nup_comission');
            $table->string('akad_comission');
        });
        Schema::create('siteplan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('CASCADE');
        });
        Schema::create('kavling', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('file_size');
            $table->string('bpn_size');

        });
        Schema::create('kavling_type', function (Blueprint $table) {
            $table->increments('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
