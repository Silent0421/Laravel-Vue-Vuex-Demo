<?php


namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        return $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \App\Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategories() {
        return $this->categoryRepository->getCategories();
    }
}
