<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryShowService
{
    public function run(Category $category): Category
    {
        return $category;
    }
}
