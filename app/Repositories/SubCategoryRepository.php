<?php


namespace App\Repositories;


use App\SubCategory;

class SubCategoryRepository
{
    public function getSubCategories() {
        return SubCategory::all();
    }

    public function getSubCategoriesByCategoryId(int $id) {
        return SubCategory::where('category_id', $id)->get();
    }
}
