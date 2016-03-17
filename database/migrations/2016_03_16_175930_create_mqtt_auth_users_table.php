<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMqttAuthUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('mqtt')->create('users', function ($table) {
        $table->increments('id');
        $table->integer('dni')->unsigned()->unique();
        $table->string('password', 128);
        $table->boolean('super');
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
        Schema::connection('mqtt')->drop('users');
    }
}
