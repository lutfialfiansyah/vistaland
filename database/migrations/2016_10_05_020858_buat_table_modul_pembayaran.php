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
            $table->integer('code')->unique();
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

       Schema::create('NUP', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->foreign('code')->references('code')->on('payment')->onDelete('CASCADE');
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
            $table->integer('code');
            $table->foreign('code')->references('code')->on('payment')->onDelete('CASCADE');
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
            Schema::drop('payment');
            Schema::drop('NUP');
            Schema::drop('promo');
            Schema::drop('BF');
            Schema::drop('SPR');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
