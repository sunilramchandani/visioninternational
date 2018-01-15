<?php

use Illuminate\Database\Seeder;
use App\Models\Programs;
use Faker\Factory;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++) {
            $program = new Programs();
            $faker = Factory::create();
            $program->title = $faker->text(25);
            $program->description = $faker->text(100);
            $program->created_by = 1;
            $program->save();
        }

    }
}
