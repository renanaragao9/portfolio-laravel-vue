<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryIndexService
{
    public function run(array $data = []): LengthAwarePaginator
    {
        return Category::paginate($data['per_page'] ?? 15);
    }
}
