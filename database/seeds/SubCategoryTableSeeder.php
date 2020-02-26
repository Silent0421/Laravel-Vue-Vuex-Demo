<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $ids = \App\Category::all()->pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {

            \App\SubCategory::create([
                'name' => $faker->word,
                'category_id' => $faker->randomElement($ids)
            ]);
        }
    }
}
