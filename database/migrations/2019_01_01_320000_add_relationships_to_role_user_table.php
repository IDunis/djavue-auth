<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('rauth_ole_user')) {
            Schema::create('auth_role_user', function (Blueprint $table) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id')->references('id')->on('auth_roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('auth_users')->onDelete('cascade');
                
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
        Schema::dropIfExists('auth_role_user');
    }
}
