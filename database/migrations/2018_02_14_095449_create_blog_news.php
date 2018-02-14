<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('date');
            $table->integer('author_id')->unsigned();
            $table->longText('body');
            $table->timestamps();
        });

        Schema::create('author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
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
