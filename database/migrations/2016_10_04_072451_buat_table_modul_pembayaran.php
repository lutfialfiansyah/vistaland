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
            $table->varchar('method');
            $table->varchar('description');
            $table->varchar('bank_reference');
            $table->varchar('type');
            // transaction_id;
            $table->varchar('transaction_id'); 
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
        Schema::drop('payment');
    }
}
