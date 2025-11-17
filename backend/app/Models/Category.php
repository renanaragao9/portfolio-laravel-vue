<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_category');
    }
}
