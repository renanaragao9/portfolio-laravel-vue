<?php

namespace App\Services\Campaign;

use App\Models\Campaign;

class CampaignDestroyService
{
    public function run(Campaign $campaign): bool
    {
        return $campaign->delete();
    }
}
