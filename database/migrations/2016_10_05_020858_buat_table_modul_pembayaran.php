<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->string('method');
            $table->string('description');
            $table->string('bank_reference');
            $table->string('type');
            // transaction_id;
            $table->string('transaction_id'); 
            //            
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
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
            Schema::drop('payment');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
