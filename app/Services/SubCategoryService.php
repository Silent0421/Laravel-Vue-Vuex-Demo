<?php


namespace App\Services;


use App\Repositories\SubCategoryRepository;

class SubCategoryService
{
    private $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function getSubCategories() {
        return $this->subCategoryRepository->getSubCategories();
    }

    public function getSubcategoriesByCategoryId(int $id) {
        return $this->subCategoryRepository->getSubCategoriesByCategoryId($id);
    }
}
