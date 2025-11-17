<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'gender',
        'image_path',
        'profile_type',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function donorProfile()
    {
        return $this->hasOne(DonorProfile::class);
    }

    public function ongProfile()
    {
        return $this->hasOne(OngProfile::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
