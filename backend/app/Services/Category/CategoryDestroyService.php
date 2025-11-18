<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryDestroyService
{
    public function run(Category $category): bool
    {
        return $category->delete();
    }
}
