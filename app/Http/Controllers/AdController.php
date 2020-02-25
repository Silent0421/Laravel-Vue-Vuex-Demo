<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class AdController extends Controller
{
    private $adService;
    private $categoryService;
    private $subCategoryService;

    public function __construct(AdService $adService, CategoryService $categoryService, SubCategoryService $subCategoryService)
    {
        $this->adService = $adService;
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
    }

    public function getAds() {
        $ads = $this->adService->getAds();

        return view('index', ['ads' => $ads]);
    }

    public function getAd(int $id) {
        $ad = $this->adService->getAd($id);

        return response()->json($ad);
    }

    public function showCreateEditForm($id = null) {
        $ad = null;
        if($id) {
            $ad = $this->adService->getAd($id);
        }

        $categories = $this->categoryService->getCategories();

        return view('create', ['categories' => $categories, 'ad' => $ad]);
    }

    public function createAd(Request $request) {
        //validate
        $this->adService->createAd($request->request->all());

        return redirect(route('getAds'));
    }

    public function getSubCategories(int $id) {
        return response()->json($this->subCategoryService->getSubcategoriesByCategoryId($id));
    }

    public function updateAd(Request $request) {
        //validate
        $this->adService->updateAd($request->request->all());

        return redirect(route('getAds'));
    }

    public function deleteAd($id) {
        $this->adService->deleteAd($id);

        return redirect(route('getAds'));
    }
}
