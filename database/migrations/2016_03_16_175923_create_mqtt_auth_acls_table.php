<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMqttAuthAclsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('mqtt')->create('acls', function ($table) {
        $table->increments('id');
        $table->integer('dni')->unsigned()->unique();
        $table->string('topic');
        $table->boolean('rw');
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
          Schema::connection('mqtt')->drop('acls');
    }
}
