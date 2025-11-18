<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryUpdateService
{
    public function run(Category $category, array $data): Category
    {
        $category->update($data);

        return $category->fresh();
    }
}
