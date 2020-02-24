<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Test $test)
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $test->index_test = $faker->numberBetween(1, 10);
            $test->save();
            $test->refresh();

            $test = new \App\Test();
        }
    }
}
