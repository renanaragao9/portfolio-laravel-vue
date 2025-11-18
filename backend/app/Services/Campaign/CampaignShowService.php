<?php

namespace App\Services\Campaign;

use App\Models\Campaign;

class CampaignShowService
{
    public function run(Campaign $campaign): Campaign
    {
        return $campaign->load(['ongProfile', 'categories', 'donations']);
    }
}
