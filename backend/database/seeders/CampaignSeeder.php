<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\OngProfile;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $ongProfiles = OngProfile::all();

        if ($ongProfiles->isEmpty()) {
            return;
        }

        foreach ($ongProfiles as $ongProfile) {
            $numCampaigns = rand(2, 5);
            Campaign::factory($numCampaigns)->create([
                'ong_profile_id' => $ongProfile->id,
            ]);
        }
    }
}
