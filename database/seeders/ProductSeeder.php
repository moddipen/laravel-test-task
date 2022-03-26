<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1,40) as $index) {
            DB::table('products')->insert([
                'id' => $index,
                'name' => $faker->name,
                'stock' => rand(50,100),
                'description' => $faker->text(200),
                'status' => 0,
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'price_per_item' => $faker->randomNumber(4),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }   
    }
}
