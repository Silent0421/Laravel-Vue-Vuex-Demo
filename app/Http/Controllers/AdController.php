<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class AdController extends Controller
{
    private $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function getAds() {
        $ads = $this->adService->getAds();

        return view('index', ['ads' => $ads]);
    }

    public function getAd(int $id) {
        $ad = $this->adService->getAd($id);

        return response()->json($ad);
    }

    public function createAd(Request $request) {
        dd($request);
    }

    public function updateAd(Request $request) {
        dd($request);
    }

    public function deleteAdd($id) {
        $this->adService->deleteAd($id);
    }
}
