<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends BaseModel
{
    protected $fillable = [
        'name',
        'icon',
    ];

    public function ongProfiles(): BelongsToMany
    {
        return $this->belongsToMany(OngProfile::class, 'ong_tag');
    }
}
