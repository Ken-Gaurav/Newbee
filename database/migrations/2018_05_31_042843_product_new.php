<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product',function(Blueprint $table){
            $table->increments('product_id');
            $table->String('product_name');
            $table->String('abbrevation');
            $table->Integer('per_kg_price');
            $table->Integer('strip_thickness');
            $table->String('image_path');
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
        Schema::drop('product');
    }
}
