<?php


namespace App\Repositories;


use App\Ad;

class AdRepository
{
<<<<<<< HEAD
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
=======
>>>>>>> origin/master
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

<<<<<<< HEAD
    /**
     * @param array $attributes
     * @return mixed
     */
=======
>>>>>>> origin/master
    public function createAd(array $attributes) {
        $ad = Ad::create($attributes);
        $ad->save();
        return $ad;
    }

<<<<<<< HEAD
    /**
     * @param array $attributes
     * @return mixed
     */
=======
>>>>>>> origin/master
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
}
