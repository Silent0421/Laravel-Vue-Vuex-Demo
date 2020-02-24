<?php


namespace App\Services;


use App\Ad;
use App\Repositories\AdRepository;

class AdService
{
    private $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function getAds() {
        return $this->adRepository->getAds();
    }

    public function getAd(int $id) {
        return $this->adRepository->getAd($id);
    }

    public function createAd(Ad $ad) {
        $this->adRepository->createAd($ad);
        return $ad;
    }

    public function updateAd(Ad $ad) {
        $this->adRepository->updateAd($ad);
        return $ad;
    }

    public function deleteAd(int $id) {
        $this->adRepository->deleteAd($id);
    }
}
