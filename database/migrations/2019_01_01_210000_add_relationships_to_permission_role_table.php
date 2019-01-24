<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('auth_permission_role')) {
            Schema::create('auth_permission_role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned()->nullable();
                $table->foreign('permission_id')->references('id')->on('auth_permissions')->onDelete('cascade');
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id')->references('id')->on('auth_roles')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_permission_role');
    }
}
