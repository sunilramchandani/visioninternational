<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sldfkf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('page_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_name');
            $table->integer('steps_id')->unsigned();
            $table->string('reminder');
            $table->timestamps();
        });


        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step_number')->unsigned();
            $table->string('image');
            $table->string('image_title');
            $table->string('image_description');
            $table->string('description');
            $table->string('sub_description');
            $table->string('button_name');
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
        Schema::dropIfExists('sdsdf');
    }
}
