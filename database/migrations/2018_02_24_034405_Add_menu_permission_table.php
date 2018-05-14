<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenuPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('menu_permission', function (Blueprint $table) {
            $table->increments('menu_permission_id');
            $table->integer('menu_id');
            $table->integer('user_id');
            $table->integer('user_type_id');
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
        Schema::drop('menu_permission');
    }
}
