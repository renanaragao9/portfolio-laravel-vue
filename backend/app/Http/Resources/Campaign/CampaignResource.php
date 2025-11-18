<?php

namespace App\Http\Resources\Campaign;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'image_path' => $this->image_path,
            'goal_amount' => $this->goal_amount,
            'status' => $this->status,
            'ong_profile_id' => $this->ong_profile_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'ong_profile' => $this->whenLoaded('ongProfile'),
            'categories' => $this->whenLoaded('categories'),
            'donations' => $this->whenLoaded('donations'),
        ];
    }
}
