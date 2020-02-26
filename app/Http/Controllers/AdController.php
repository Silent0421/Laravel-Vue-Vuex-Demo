<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEditAd;
use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use Illuminate\Http\Response;

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
        $response = Response::class;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAds() {
        $ads = $this->adService->getAds();

        return view('index', ['ads' => $ads]);
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
     * @param CreateEditAd $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createAd(CreateEditAd $request) {

        $this->adService->createAd($request->request->all());

        return redirect(route('getAds'));
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
     * @param CreateEditAd $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAd(CreateEditAd $request) {

        $this->adService->updateAd($request->request->all());

        return redirect(route('getAds'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteAd($id) {
        $this->adService->deleteAd($id);

        return redirect(route('getAds'));
    }
}
