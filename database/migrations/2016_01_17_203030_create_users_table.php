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
          $table->increments('id');
          $table->string('name',32);
          $table->string('lastname',32);
          $table->string('email',128)->unique();
          $table->string('password', 128);
          $table->string('token',128);
          $table->integer('dni')->unsigned();
          $table->integer('state_id')->unsigned();
          $table->integer('city_id')->unsigned();
          $table->integer('rol_id')->unsigned();
          $table->boolean('active');
          $table->rememberToken();
          $table->timestamps();
          $table->foreign('state_id')->references('id')->on('states');
          $table->foreign('city_id')->references('id')->on('cities');
          $table->foreign('rol_id')->references('id')->on('roles');
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
