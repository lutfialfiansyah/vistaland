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
        Schema::create('kavling_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('description');
        });
        Schema::create('kavling_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->unsignedInteger('house_type_id');
            $table->foreign('house_type_id')->references('id')->on('kavling_type')->onDelete('CASCADE');
        });
        Schema::create('strategic_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
        });
        Schema::create('strategic_type_price', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('strategic_type_id');
            $table->foreign('strategic_type_id')->references('id')->on('strategic_type')->onDelete('CASCADE');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('CASCADE');
            $table->integer('price');
        });

         Schema::create('price', function (Blueprint $table) {
            $table->increments('id');
            $table->date('expired_date');
            $table->integer('price');
            $table->integer('administration_price');
            $table->integer('renovation_price');
            $table->integer('left_over_price');
            $table->integer('move_kavling_price');
            $table->integer('change_name_price');
            $table->string('management_confirm_status');
            $table->string('memo');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('CASCADE');
            $table->unsignedInteger('kavling_type_id');
            $table->foreign('kavling_type_id')->references('id')->on('kavling_type')->onDelete('CASCADE');
        });
         Schema::create('kavling', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->string('field_size');
            $table->string('bpn_size');
            $table->string('left_over_size');
            $table->string('Imb_parent');
            $table->string('Imb_parent_date');
            $table->string('Imb_fraction');
            $table->string('Imb_fraction_date');
            $table->string('pbb');
            $table->string('pln_no');
            $table->string('status');
            $table->string('progress');
            $table->unsignedInteger('strategic_type_id');
            $table->foreign('strategic_type_id')->references('id')->on('strategic_type')->onDelete('CASCADE');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('CASCADE');
            $table->unsignedInteger('kavling_type_id');
            $table->foreign('kavling_type_id')->references('id')->on('kavling_type')->onDelete('CASCADE');
            $table->unsignedInteger('price_id')->nullable();
            $table->foreign('price_id')->references('id')->on('price')->onDelete('CASCADE');
        });
        Schema::create('complaint', function (Blueprint $table) {
            $table->increments('id');
            $table->string('memo');
            $table->string('status');
            $table->date('finish_date');
            $table->string('pic');
            $table->unsignedInteger('kavling_id');
            $table->foreign('kavling_id')->references('id')->on('kavling')->onDelete('CASCADE');
        });
        Schema::create('tax_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ssp_total');
            $table->string('bphtb_total');
            $table->unsignedInteger('kavling_id');
            $table->foreign('kavling_id')->references('id')->on('kavling')->onDelete('CASCADE');
        });
        Schema::create('fractional_certificate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('certificate');
            $table->unsignedInteger('kavling_id');
            $table->foreign('kavling_id')->references('id')->on('kavling')->onDelete('CASCADE');
        });
        Schema::create('lpa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('ppjb_no');
            $table->date('ppjb_date');
            $table->string('ppjb_notary');
            $table->integer('ajb_no');
            $table->date('ajb_date');
            $table->string('ajb_notary');
            $table->integer('ssp_no');
            $table->date('ssp_date');
            $table->integer('ssp_total');
            $table->integer('bphtb_no');
            $table->date('bphtb_date');
            $table->integer('bphtb_total');
            $table->string('transfer_title_certificate');
            $table->date('transfer_title_date');
            $table->string('transfer_title_pbb');
            $table->date('transfer_title_pbb_date');
        });
        Schema::create('authorized_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_manager');
            $table->string('project_manager_assistant');
            $table->string('finance_spv');
            $table->string('inhouse_spv');
            $table->string('field_executive');
            $table->string('admin');
            $table->string('legal');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('CASCADE');
        });
        Schema::create('official', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('status');
            $table->string('role');
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
            Schema::drop('project');
            Schema::drop('siteplan');
            Schema::drop('kavling_type');
            Schema::drop('kavling_image');
            Schema::drop('strategic_type');
            Schema::drop('strategic_type_price');
            Schema::drop('kavling');
            Schema::drop('price');
            Schema::drop('complaint');
            Schema::drop('tax_payment');
            Schema::drop('fractional_certificate');
            Schema::drop('lpa');
            Schema::drop('authorized_user');
            Schema::drop('official');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
