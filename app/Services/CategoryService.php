<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        return $this->categoryRepository = $categoryRepository;
    }

    public function getCategories() {
        return $this->categoryRepository->getCategories();
    }
}
