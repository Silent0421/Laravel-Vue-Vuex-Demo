<?php


namespace App\Repositories;


use App\Ad;

class AdRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAds() {
        return Ad::with(['category', 'subCategory'])->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getAd(int $id) {
        return Ad::find($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createAd(array $attributes) {
        $ad = Ad::create($attributes);
        $ad->save();
        return $ad;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function updateAd(array $attributes) {
        $adInstance = Ad::find($attributes['id']);
        $adInstance->fill($attributes);
        $adInstance->save();
        return $adInstance;
    }

    /**
     * @param int $id
     */
    public function deleteAd(int $id) {
        $ad = Ad::find($id);
        $ad->delete();
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getUserAds(int $userId) {
        return Ad::where('user_id', $userId)->with(['category', 'subcategory'])->get();
    }
}
