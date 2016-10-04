<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableModulPenjualan extends Migration
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
            $table->varchar('first_name');
            $table->varchar('last_name');
            $table->varchar('ktp_number');
            $table->integer('ktp_expire');
            $table->varchar('house_address');
            $table->varchar('office_address');
            $table->varchar('email');
            $table->varchar('house_phone');
            $table->varchar('office_phone');
            $table->varchar('relative_name');
            $table->varchar('relative_phone');
            $table->varchar('relative_ktp');
            $table->varchar('spouse_name');
            $table->varchar('spouse_ktp');
            $table->varchar('image');
            $table->varchar('bank_account_number');
            $table->integer('btn_id');
            $table->varchar('btn_account_number');
            $table->varchar('btn_branch');
            $table->varchar('mk_application');
            $table->varchar('deposit_loan_akad');
            $table->varchar('status');
            $table->varchar('priority_status');
        });

        Schema::create('customer_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('phone');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
        });

        Schema::create('NUP', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('comission_status');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
            $table->integer('agen_id');
        });

        Schema::create('promo', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('name');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('discount');
            $table->integer('agent_bonus');
            $table->integer('team_bonus');
        });

        Schema::create('BF', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('comission_status');
            $table->unsignedInteger('nup_id');
            $table->foreign('nup_id')->references('id')->on('NUP')->onDelete('CASCADE');
            $table->unsignedInteger('kavling_id');
            $table->foreign('kavling_id')->references('id')->on('kavling')->onDelete('CASCADE');
            $table->unsignedInteger('promo_id');
            $table->foreign('promo')->references('id')->on('promo')->onDelete('CASCADE');
        });

        Schema::create('SPR', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('move_status');
            $table->varchar('chage_name_status');
            $table->varchar('type');
            $table->varchar('memo');
            $table->varchar('image');
            $table->varchar('status');
            $table->unsignedInteger('bf_id');
            $table->foreign('bf_id')->references('id')->on('BF')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer');
        Schema::drop('customer_phone');
        Schema::drop('NUP');
        Schema::drop('promo');
        Schema::drop('BF');
        Schema::drop('SPR');
    }
}
