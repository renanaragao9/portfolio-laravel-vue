<?php

namespace App\Services\Campaign;

use App\Models\Campaign;

class CampaignStoreService
{
    public function run(array $data): Campaign
    {
        return Campaign::create($data);
    }
}
