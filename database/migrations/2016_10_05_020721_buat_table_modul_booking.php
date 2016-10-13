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
            $table->integer('ktp_expire');
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
        });

        Schema::create('customer_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
        });

        Schema::create('NUP', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comission_status');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('CASCADE');
            /*
            belum jelas
             */
            $table->integer('agen_id');
        });

        Schema::create('promo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('discount');
            $table->integer('agent_bonus');
            $table->integer('team_bonus');
        });

        Schema::create('BF', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comission_status');
            $table->unsignedInteger('nup_id');
            $table->foreign('nup_id')->references('id')->on('NUP')->onDelete('CASCADE');
            $table->unsignedInteger('kavling_id');
            $table->foreign('kavling_id')->references('id')->on('kavling')->onDelete('CASCADE');
            $table->unsignedInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promo')->onDelete('CASCADE');
        });

        Schema::create('SPR', function (Blueprint $table) {
            $table->increments('id');
            $table->string('move_status');
            $table->string('chage_name_status');
            $table->string('type');
            $table->string('memo');
            $table->string('image');
            $table->string('status');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Schema::drop('customer');
            Schema::drop('customer_phone');
            Schema::drop('NUP');
            Schema::drop('promo');
            Schema::drop('BF');
            Schema::drop('SPR');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
