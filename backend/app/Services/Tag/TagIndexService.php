<?php

namespace App\Services\Tag;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class TagIndexService
{
    public function run(array $data = []): LengthAwarePaginator
    {
        return Tag::paginate($data['per_page'] ?? 15);
    }
}
