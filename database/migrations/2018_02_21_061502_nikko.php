<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nikko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qualification_name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('opportunity_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opportunity_name');
            $table->timestamps();
            $table->softDeletes();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
