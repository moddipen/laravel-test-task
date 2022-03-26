<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1,3) as $index) {
            DB::table('users')->insert([
                'id' => $index,
                'name' => $faker->name,
                'email' => $faker->email,
                'role' => 1,
                'email_verified_at' => now(),
                'password' =>  Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }     
    }
}
