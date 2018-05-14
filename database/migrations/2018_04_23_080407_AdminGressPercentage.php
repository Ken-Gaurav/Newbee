<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminGressPercentage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('admin_gress_percentage', function (Blueprint $table) {
            $table->increments('admin_gress_percentage_id');
            $table->integer('user_id');
            $table->integer('admin_gress_details_id');
            $table->integer('quantity');
            $table->float('by_factory');
            $table->float('by_air');
            $table->float('by_sea');
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
        Schema::drop('admin_gress_percentage');
    }
}
