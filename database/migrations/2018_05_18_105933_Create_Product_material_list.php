<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMaterialList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('product_material',function(Blueprint $table){
            $table->increments('product_material_id');
            $table->String('material_name');
            $table->String('layers');
            $table->float('gsm');
            $table->String('minimum_product_quo');
            $table->String('thickness');
            $table->String('printing_effect');
            $table->String('make_pouch');
            $table->String('quantity');
            $table->String('material_unit');
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
        Schema::drop('product_material');
    }
}
