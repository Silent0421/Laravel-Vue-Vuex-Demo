<?php


namespace App\Repositories;


use App\Category;

class CategoryRepository
{
    public function getCategories() {
        return Category::all();
    }
}
