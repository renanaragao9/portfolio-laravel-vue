<?php

namespace App\Services\Campaign;

use App\Models\Campaign;

class CampaignUpdateService
{
    public function run(Campaign $campaign, array $data): Campaign
    {
        $campaign->update($data);

        return $campaign->fresh(['ongProfile', 'categories']);
    }
}
