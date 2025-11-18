<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryStoreService
{
    public function run(array $data): Category
    {
        return Category::create($data);
    }
}
