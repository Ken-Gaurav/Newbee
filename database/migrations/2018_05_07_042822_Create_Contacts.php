<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->string('customer_name');
            $table->string('customer_email')->unique();
            $table->string('vat_no');
            $table->string('gst_no');
            $table->bigInteger('contact_number');
            $table->string('Consignee',255);
            $table->string('delivery_address',255);
            $table->string('city');
            $table->string('state');
            $table->integer('country');
            $table->integer('user_id');
            $table->integer('user_type_id');
            $table->integer('user_parent_id');
            $table->tinyInteger('status');
            $table->softDeletes();
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
        Schema::drop('contacts');
    }
}
