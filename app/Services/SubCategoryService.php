<?php


namespace App\Services;


use App\Repositories\SubCategoryRepository;

class SubCategoryService
{
    /**
     * @var SubCategoryRepository
     */
    private $subCategoryRepository;

    /**
     * SubCategoryService constructor.
     * @param SubCategoryRepository $subCategoryRepository
     */
    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    /**
     * @return \App\SubCategory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getSubCategories() {
        return $this->subCategoryRepository->getSubCategories();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSubcategoriesByCategoryId($id) {
        return $this->subCategoryRepository->getSubCategoriesByCategoryId($id);
    }
}
