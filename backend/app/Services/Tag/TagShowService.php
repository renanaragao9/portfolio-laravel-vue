<?php

namespace App\Services\Tag;

use App\Models\Tag;

class TagShowService
{
    public function run(Tag $tag): Tag
    {
        return $tag;
    }
}
