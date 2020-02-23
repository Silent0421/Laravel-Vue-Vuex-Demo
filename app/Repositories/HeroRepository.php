<?php


namespace App\Repositories;


use App\Hero;

class HeroRepository
{
    private $heroModel;

    public function __construct(Hero $heroModel)
    {
        $this->heroModel = $heroModel;
    }

    public function getHeroes() {
        return $this->heroModel->all();
    }
}
