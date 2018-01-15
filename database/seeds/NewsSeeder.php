<?php

use Illuminate\Database\Seeder;
use App\Models\News;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++) {
            $news = new News();
            $faker = Factory::create();
            $news->title = $faker->text(25);
            $news->article = $faker->text(1255);
            $news->created_by = 1;

            $news->save();
        }
    }
}
