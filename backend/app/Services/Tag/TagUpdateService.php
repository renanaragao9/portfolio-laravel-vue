<?php

namespace App\Services\Tag;

use App\Models\Tag;

class TagUpdateService
{
    public function run(Tag $tag, array $data): Tag
    {
        $tag->update($data);

        return $tag->fresh();
    }
}
