<?php

namespace App\Models;

class OngProfile extends BaseModel
{
    protected $fillable = [
        'name',
        'cnpj',
        'image_path',
        'website_url',
        'asaas_customer_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'ong_tag');
    }
}
