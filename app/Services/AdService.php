<?php


namespace App\Services;

use App\Repositories\AdRepository;

class AdService
{
    /**
     * @var AdRepository
     */
    private $adRepository;

    /**
     * AdService constructor.
     * @param AdRepository $adRepository
     */
    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAds() {
        return $this->adRepository->getAds();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getAd(int $id) {
        return $this->adRepository->getAd($id);
    }

<<<<<<< HEAD
    /**
     * @param array $attributes
     * @return mixed
     */
=======
>>>>>>> origin/master
    public function createAd(array $attributes) {
        return $this->adRepository->createAd($attributes);
    }

<<<<<<< HEAD
    /**
     * @param array $attributes
     * @return mixed
     */
=======
>>>>>>> origin/master
    public function updateAd(array $attributes) {
        return $this->adRepository->updateAd($attributes);
    }

    /**
     * @param int $id
     */
    public function deleteAd(int $id) {
        $this->adRepository->deleteAd($id);
    }
}
