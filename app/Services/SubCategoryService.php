<?php


namespace App\Services;


use App\Repositories\SubCategoryRepository;

class SubCategoryService
{
<<<<<<< HEAD
    /**
     * @var SubCategoryRepository
     */
    private $subCategoryRepository;

    /**
     * SubCategoryService constructor.
     * @param SubCategoryRepository $subCategoryRepository
     */
=======
    private $subCategoryRepository;

>>>>>>> origin/master
    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

<<<<<<< HEAD
    /**
     * @return \App\SubCategory[]|\Illuminate\Database\Eloquent\Collection
     */
=======
>>>>>>> origin/master
    public function getSubCategories() {
        return $this->subCategoryRepository->getSubCategories();
    }

<<<<<<< HEAD
    /**
     * @param int $id
     * @return mixed
     */
    public function getSubcategoriesByCategoryId($id) {
=======
    public function getSubcategoriesByCategoryId(int $id) {
>>>>>>> origin/master
        return $this->subCategoryRepository->getSubCategoriesByCategoryId($id);
    }
}
