<?php

namespace App\Services;

use App\Repositories\HeroRepository;

class HeroService
{
    public $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function getHeroes() {
        return $this->heroRepository->getHeroes();
    }
}
