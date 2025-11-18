<?php

namespace App\Http\Resources\Donation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
            'asaas_payment_id' => $this->asaas_payment_id,
            'asaas_pix_qr' => $this->asaas_pix_qr,
            'asaas_pix_code' => $this->asaas_pix_code,
            'transaction_date' => $this->transaction_date,
            'payment_date' => $this->payment_date,
            'compaign_id' => $this->compaign_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => $this->whenLoaded('user'),
            'campaign' => $this->whenLoaded('campaign'),
        ];
    }
}
