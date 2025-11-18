<?php

namespace App\Services\Tag;

use App\Models\Tag;

class TagDestroyService
{
    public function run(Tag $tag): bool
    {
        return $tag->delete();
    }
}
