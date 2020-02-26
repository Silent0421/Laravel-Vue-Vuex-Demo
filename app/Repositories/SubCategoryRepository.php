<?php


namespace App\Repositories;


use App\SubCategory;

class SubCategoryRepository
{
    /**
     * @return SubCategory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getSubCategories() {
        return SubCategory::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSubCategoriesByCategoryId(int $id) {
        return SubCategory::where('category_id', $id)->get();
    }
}
