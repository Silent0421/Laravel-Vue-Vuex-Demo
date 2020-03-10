<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEditAdRequest;
use App\Http\Requests\DeleteAdRequest;
use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * @var AdService
     */
    private $adService;

    /**
     * AdController constructor.
     * @param AdService $adService
     */
    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAds() {

        $ads = $this->adService->getAds();

        return response()->json($ads);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAd(int $id) {
        $ad = $this->adService->getAd($id);

        return response()->json($ad);
    }

    /**
     * @param CategoryService $categoryService
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateEditForm(CategoryService $categoryService, $id = null) {
        $ad = null;
        if($id) {
            $ad = $this->adService->getAd($id);
        }

        $categories = $categoryService->getCategories();

        return view('create', ['categories' => $categories, 'ad' => $ad]);
    }

    /**
     * @param CreateEditAdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAd(CreateEditAdRequest $request) {

        $attributes = $request->request->all();
        $attributes += ['user_id' => Auth::id()];
        $ad = $this->adService->createAd($attributes);

         return response()->json($ad);
    }


    /**
     * @param CategoryService $categoryService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories(CategoryService $categoryService) {
        $categories = $categoryService->getCategories();

        return response()->json($categories);
    }

    /**
     * @param SubCategoryService $subCategoryService
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubCategories(int $id , SubCategoryService $subCategoryService) {
        return response()->json($subCategoryService->getSubcategoriesByCategoryId($id));
    }

    /**
     * @param CreateEditAdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAd(CreateEditAdRequest $request) {

        $ad = $this->adService->updateAd($request->request->all());

        return response()->json($ad);
    }

    /**
     * @param DeleteAdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAd(DeleteAdRequest $request) {
        $ad = $this->adService->deleteAd($request->get('id'));

        return response()->json($ad);
    }

    /**
     * @param int $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserAds(int $userId) {

        $ads = $this->adService->getUserAds($userId);

        return response()->json($ads);
    }
}
