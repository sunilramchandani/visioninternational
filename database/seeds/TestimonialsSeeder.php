<?php

use Illuminate\Database\Seeder;
use App\Models\Testimonials;
use Faker\Factory;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++) {
            $testimonials = new Testimonials();
            $faker = Factory::create();
            $testimonials->first_name = $faker->firstName;
            $testimonials->last_name = $faker->lastName;
            $testimonials->organization = $faker->company;
            $testimonials->testimony = $faker->text(455);
            $testimonials->created_by = 1;
            $testimonials->save();
        }
    }
}
