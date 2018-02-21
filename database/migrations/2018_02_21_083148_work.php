<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Work extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qualification_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('work_opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->integer('company_id')->unsigned();
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
