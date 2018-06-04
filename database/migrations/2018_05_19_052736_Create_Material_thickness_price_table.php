<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialThicknessPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_material_thickness_price',function(Blueprint $table){
            $table->increments('product_material_thickness_id');
            $table->Integer('product_material_id');
            $table->String('thickness_form');
            $table->String('thickness_to');
            $table->String('thickness_price');
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
        Schema::drop('product_material_thickness_price');
    }
}
