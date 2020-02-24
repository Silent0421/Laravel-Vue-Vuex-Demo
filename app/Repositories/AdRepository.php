<?php


namespace App\Repositories;


use App\Ad;

class AdRepository
{
    private $adModel;

    public function __construct(Ad $adModel)
    {
        $this->adModel = $adModel;
    }

    public function getAds() {
        return $this->adModel->all();
    }

    public function getAd(int $id) {
        return $this->adModel->find($id);
    }

    public function createAd(Ad $ad) {
        $ad->save();
        return $ad;
    }

    public function updateAd(Ad $ad) {
        $adInstance = $this->adModel->find($ad->id);
        $adInstance->save();
        return $ad;
    }

    public function deleteAd(int $id) {
        $ad = $this->adModel->find($id);
        $ad->delete();
    }
}
