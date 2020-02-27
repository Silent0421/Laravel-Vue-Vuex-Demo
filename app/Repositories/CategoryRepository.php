<?php


namespace App\Repositories;


use App\Category;

class CategoryRepository
{
    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategories() {
        return Category::all();
    }
}
