<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'image_path' => $this->image_path,
            'profile_type' => $this->profile_type,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'donor_profile' => $this->whenLoaded('donorProfile'),
            'ong_profile' => $this->whenLoaded('ongProfile'),
        ];
    }
}
