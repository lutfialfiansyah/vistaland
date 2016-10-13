<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulPriority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('priority', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
      });
      Schema::create('priority_detail', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('customer_id');
          $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
          $table->unsignedInteger('priority_id');
          $table->foreign('priority_id')->references('id')->on('priority')->onDelete('CASCADE');
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
          Schema::drop('priority');
          Schema::drop('priority_detail');
      DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
