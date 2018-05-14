<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolePermissionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->increments('role_permission_id');
            $table->integer('user_id');
            $table->integer('user_type_id');
            $table->longText('add_permission');
            $table->longText('edit_permission');
            $table->longText('delete_permission');
            $table->longText('view_permission');
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
        Schema::drop('role_permission');
    }
}
