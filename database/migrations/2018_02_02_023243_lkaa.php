<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lkaa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_duration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duration_months');
            $table->integer('duration_price');
            $table->date('duration_start_date');
            $table->timestamps();
        });

        Schema::create('work_industry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('industry_name');
            $table->integer('company_id');
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
        //
    }
}
