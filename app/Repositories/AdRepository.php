<?php


namespace App\Repositories;


use App\Ad;

class AdRepository
{
    public function getAds() {
        return Ad::with(['category', 'subCategory'])->get();
    }

    public function getAd(int $id) {
        return Ad::find($id);
    }

    public function createAd(array $attributes) {
        $ad = Ad::create($attributes);
        $ad->save();
        return $ad;
    }

    public function updateAd(array $attributes) {
        $adInstance = Ad::find($attributes['id']);
        $adInstance->fill($attributes);
        $adInstance->save();
        return $adInstance;
    }

    public function deleteAd(int $id) {
        $ad = Ad::find($id);
        $ad->delete();
    }
}
