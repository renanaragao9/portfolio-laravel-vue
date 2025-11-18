<?php

namespace App\Http\Resources\DonorProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonorProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'asaas_customer_id' => $this->asaas_customer_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => $this->whenLoaded('user'),
            'address' => $this->whenLoaded('address'),
        ];
    }
}
