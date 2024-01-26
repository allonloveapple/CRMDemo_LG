<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('crm_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('platform')->nullable();
            $table->string('platform_type')->nullable();
            $table->string('trade_account')->nullable();
            $table->string('password')->nullable();
            $table->string('a_b_stock')->nullable();
            $table->string('name')->nullable();
            $table->datetime('last_deposit_time')->nullable();
            $table->float('deposit_amount', 15, 2)->nullable();
            $table->string('withdraw_account')->nullable();
            $table->datetime('last_withdraw_time')->nullable();
            $table->float('withdraw_amount', 15, 2)->nullable();
            $table->string('ib')->nullable();
            $table->string('second_ib')->nullable();
            $table->string('bonus')->nullable();
            $table->string('rebate')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('vps')->nullable();
            $table->string('vps_account')->nullable();
            $table->string('vps_password')->nullable();
            $table->string('mm_strategy')->nullable();
            $table->float('mm_mutiple', 15, 2)->nullable();
            $table->string('trade_strategy')->nullable();
            $table->float('trade_multiple', 15, 2)->nullable();
            $table->integer('leverage')->nullable();
            $table->float('predict_rebate', 15, 2)->nullable();
            $table->float('total_profit', 15, 2)->nullable();
            $table->float('day_profit', 15, 2)->nullable();
            $table->float('total_volume', 15, 2)->nullable();
            $table->float('balance', 15, 2)->nullable();
            $table->float('equity', 15, 2)->nullable();
            $table->float('floating', 15, 2)->nullable();
            $table->integer('order_number')->nullable();
            $table->integer('missing')->nullable();
            $table->string('connect_status')->nullable();
            $table->longText('comment')->nullable();
            $table->string('archive_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
