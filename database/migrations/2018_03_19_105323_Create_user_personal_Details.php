<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPersonalDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('user_personal_details', function (Blueprint $table) {
            $table->increments('user_personal_details_id');
            $table->integer('user_id');
            $table->string('company_logo');
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('telephone');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('state');
            $table->integer('country_id');
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
        Schema::drop('user_personal_details');
    }
}
