<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ktp_number');
            $table->string('ktp_expire');
            $table->string('house_address');
            $table->string('office_address');
            $table->string('email');
            $table->string('house_phone');
            $table->string('office_phone');
            $table->string('relative_name');
            $table->string('relative_phone');
            $table->string('relative_ktp');
            $table->string('spouse_name');
            $table->string('spouse_ktp');
            $table->string('image');
            $table->string('bank_account_number');
            $table->integer('btn_id');
            $table->string('btn_account_number');
            $table->string('btn_branch');
            $table->string('mk_application');
            $table->string('deposit_loan_akad');
            $table->string('status');
            $table->string('priority_status');
            $table->timestamps();
        });

        Schema::create('customer_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
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
            Schema::drop('customer');
            Schema::drop('customer_phone');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
