<?php

namespace App\Models;

class Address extends BaseModel
{
    protected $fillable = [
        'zipcode',
        'neighborhood',
        'street',
        'number',
        'complement',
        'city',
        'state',
        'addressable_type',
        'addressable_id',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
