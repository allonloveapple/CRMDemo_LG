<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCrmCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('crm_customers', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_9437024')->references('id')->on('crm_statuses');
            $table->unsignedBigInteger('belong_id')->nullable();
            $table->foreign('belong_id', 'belong_fk_9437032')->references('id')->on('users');
        });
    }
}
