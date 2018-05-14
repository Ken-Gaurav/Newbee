<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeAssociatedUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('associated_accounts', function (Blueprint $table) {
            $table->increments('associated_accounts_id');
            $table->integer('user_id');
            $table->integer('employee_detail_id');
            $table->string('associated_users');
            $table->tinyInteger('is_delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('associated_accounts');
    }
}
