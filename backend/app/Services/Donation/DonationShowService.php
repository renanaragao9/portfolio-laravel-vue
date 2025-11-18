<?php

namespace App\Services\Donation;

use App\Models\Donation;

class DonationShowService
{
    public function run(Donation $donation): Donation
    {
        return $donation->load(['user', 'campaign']);
    }
}
