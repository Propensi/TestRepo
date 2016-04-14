<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_ID');
            $table->string('name', 32);
            $table->string('no_peg')->unique();
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->string('role', 20);
            $table->string('Dept_name', 20);
            $table->char('Mgr_ID', 5);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
