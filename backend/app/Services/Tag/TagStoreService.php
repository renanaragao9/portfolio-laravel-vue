<?php

namespace App\Services\Tag;

use App\Models\Tag;

class TagStoreService
{
    public function run(array $data): Tag
    {
        return Tag::create($data);
    }
}
