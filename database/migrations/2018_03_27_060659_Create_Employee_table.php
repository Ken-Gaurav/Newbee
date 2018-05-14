<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->increments('employee_details_id');
            $table->integer('user_id');
            $table->integer('parent_user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('telephone');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('state');
            $table->integer('country_id');
            $table->text('email_signature');
            $table->tinyInteger('stock_order_price');
            $table->tinyInteger('multi_quotation_price');
            $table->tinyInteger('stock_price_compulsory');
            $table->tinyInteger('status');
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
        Schema::drop('employee_details');
    }
}
