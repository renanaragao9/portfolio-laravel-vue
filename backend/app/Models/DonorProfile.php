<?php

namespace App\Models;

class DonorProfile extends BaseModel
{
    protected $fillable = [
        'cpf',
        'phone',
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
}
