<?php

namespace App\Http\Resources\OngProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OngProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cnpj' => $this->cnpj,
            'image_path' => $this->image_path,
            'website_url' => $this->website_url,
            'asaas_customer_id' => $this->asaas_customer_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => $this->whenLoaded('user'),
            'address' => $this->whenLoaded('address'),
        ];
    }
}
