<?php


namespace App\Repositories;


use App\SubCategory;

class SubCategoryRepository
{
<<<<<<< HEAD
    /**
     * @return SubCategory[]|\Illuminate\Database\Eloquent\Collection
     */
=======
>>>>>>> origin/master
    public function getSubCategories() {
        return SubCategory::all();
    }

<<<<<<< HEAD
    /**
     * @param int $id
     * @return mixed
     */
=======
>>>>>>> origin/master
    public function getSubCategoriesByCategoryId(int $id) {
        return SubCategory::where('category_id', $id)->get();
    }
}
