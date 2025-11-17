<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends BaseModel
{
    protected $fillable = [
        'amount',
        'status',
        'asaas_payment_id',
        'asaas_pix_qr',
        'asaas_pix_code',
        'transaction_date',
        'payment_date',
        'compaign_id',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'transaction_date' => 'date',
            'payment_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'compaign_id');
    }
}
