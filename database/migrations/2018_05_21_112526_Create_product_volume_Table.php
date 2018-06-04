<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVolumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_volume',function(Blueprint $table){
            $table->increments('product_volume_id');
            $table->String('volume');
            $table->Integer('primary_measurement_id');
            $table->String('uk_volume');
            $table->Integer('secondary_measurement_id');
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
        Schema::drop('product_volume');
    }
}
