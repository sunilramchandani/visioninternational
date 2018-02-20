<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_v2', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('date');
            $table->integer('author_id')->unsigned();
            $table->longText('body');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('news_main_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned();
            $table->string('image_name');
            $table->timestamps();
        });
        
        Schema::create('category_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blog_id');
            $table->string('category_name');
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
