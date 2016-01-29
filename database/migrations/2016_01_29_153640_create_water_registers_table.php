<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('water_registers', function (Blueprint $table) {
        $table->increments('id')->unique();
        $table->integer('user_id')->unsigned();
        $table->integer('value');
        $table->string('state',32);
        $table->string('city', 32);
        $table->date('date');
    });

  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('water_registers');
    }
}
