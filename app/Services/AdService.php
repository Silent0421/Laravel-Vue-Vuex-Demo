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

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createAd(array $attributes) {
        return $this->adRepository->createAd($attributes);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function updateAd(array $attributes) {
        return $this->adRepository->updateAd($attributes);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteAd(int $id) {
        return $this->adRepository->deleteAd($id);
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getUserAds(int $userId) {

        return $this->adRepository->getUserAds($userId);
    }
}
