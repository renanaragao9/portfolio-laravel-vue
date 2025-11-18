<?php

namespace App\Services\Campaign;

use App\Models\Campaign;
use Illuminate\Pagination\LengthAwarePaginator;

class CampaignIndexService
{
    public function run(array $data = []): LengthAwarePaginator
    {
        return Campaign::with(['ongProfile', 'categories'])->paginate($data['per_page'] ?? 15);
    }
}
