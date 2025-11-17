<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'image_path',
        'goal_amount',
        'status',
        'ong_profile_id',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'goal_amount' => 'decimal:2',
        ];
    }

    public function ongProfile(): BelongsTo
    {
        return $this->belongsTo(OngProfile::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'campaign_category');
    }
}
