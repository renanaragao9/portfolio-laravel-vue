<?php

namespace App\Models;

class Tag extends BaseModel
{
    protected $fillable = [
        'name',
        'icon',
    ];

    public function ongProfiles()
    {
        return $this->belongsToMany(OngProfile::class, 'ong_tag');
    }
}
