<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminGressDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('admin_gress_details', function (Blueprint $table) {
            $table->increments('admin_gress_details_id');
            $table->integer('user_id');
            $table->integer('gst_for_invoice');
            $table->string('company_address');
            $table->string('bank_address');
            $table->text('email_signature');
            $table->text('term_and_conditions');
            $table->float('valve_price');
            $table->float('color_plate_price');
            $table->float('gress_for_cylinder');
            $table->string('stockorder_quantity_for_price');
            $table->tinyInteger('stockorder_price_display');
            $table->tinyInteger('multiquotation_price_display');
            $table->tinyInteger('allow_currency_selection');
            $table->tinyInteger('send_email_with_gress');
            $table->integer('order_limit');
            $table->integer('primary_currency');
            $table->integer('secondary_currency');
            $table->float('product_currency_rate');
            $table->float('cylinder_currency_rate');
            $table->float('tool_currency_rate');
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
        Schema::drop('admin_gress_details');
    }
}
