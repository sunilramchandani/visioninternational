<?php

use Illuminate\Database\Seeder;
use App\Models\Users;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'email' => 'admin@visioninternational.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
