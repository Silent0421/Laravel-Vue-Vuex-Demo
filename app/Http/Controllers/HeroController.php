<?php

namespace App\Http\Controllers;

use App\Services\HeroService;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    private $heroService;

    public function __construct(HeroService $heroService)
    {
        $this->heroService = $heroService;
    }

    public function getHeroes(Request $request) {
        $heroes = $this->heroService->getHeroes();

        return response()->json($heroes);
    }
}
