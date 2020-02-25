<?php


namespace App\Services;

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

    public function createAd(array $attributes) {
        return $this->adRepository->createAd($attributes);
    }

    public function updateAd(array $attributes) {
        return $this->adRepository->updateAd($attributes);
    }

    public function deleteAd(int $id) {
        $this->adRepository->deleteAd($id);
    }
}
