<?php

use Illuminate\Database\Seeder;
use App\Hero;

class CreateHeroes extends Seeder
{
    /**
     * @param Hero $heroModel
     */
    public function run(Hero $heroModel)
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 10; $i++) {
            $heroModel->name = $faker->name;
            $heroModel->realName = $faker->name;
            $heroModel->description = $faker->text(100);
            $heroModel->age = $faker->numberBetween(20, 60);
            $heroModel->catchPhrase = $faker->word;

            $heroModel->save();

            $heroModel = new Hero();
        }
    }
}
