<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEditAd;
use App\Http\Requests\DeleteAd;
use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
<<<<<<< HEAD
use Illuminate\Http\Response;
=======
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
>>>>>>> origin/master

class AdController extends Controller
{
    /**
     * @var AdService
     */
    private $adService;
    private $categoryService;
    private $subCategoryService;

<<<<<<< HEAD
    /**
     * AdController constructor.
     * @param AdService $adService
     */
    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
        $response = Response::class;
=======
    public function __construct(AdService $adService, CategoryService $categoryService, SubCategoryService $subCategoryService)
    {
        $this->adService = $adService;
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
>>>>>>> origin/master
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

<<<<<<< HEAD
    /**
     * @param CategoryService $categoryService
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateEditForm(CategoryService $categoryService, $id = null) {
=======
    public function showCreateEditForm($id = null) {
>>>>>>> origin/master
        $ad = null;
        if($id) {
            $ad = $this->adService->getAd($id);
        }

<<<<<<< HEAD
        $categories = $categoryService->getCategories();
=======
        $categories = $this->categoryService->getCategories();
>>>>>>> origin/master

        return view('create', ['categories' => $categories, 'ad' => $ad]);
    }

<<<<<<< HEAD
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
     * @param DeleteAd $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteAd(DeleteAd $request) {
        $this->adService->deleteAd($request->get('id'));
=======
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
>>>>>>> origin/master

        return redirect(route('getAds'));
    }
}
