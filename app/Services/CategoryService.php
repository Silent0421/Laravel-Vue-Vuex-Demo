<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{
<<<<<<< HEAD
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
=======
    private $categoryRepository;

>>>>>>> origin/master
    public function __construct(CategoryRepository $categoryRepository)
    {
        return $this->categoryRepository = $categoryRepository;
    }

<<<<<<< HEAD
    /**
     * @return \App\Category[]|\Illuminate\Database\Eloquent\Collection
     */
=======
>>>>>>> origin/master
    public function getCategories() {
        return $this->categoryRepository->getCategories();
    }
}
