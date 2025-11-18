<?php

namespace App\Services\Donation;

use App\Models\Donation;

class DonationUpdateService
{
    public function run(Donation $donation, array $data): Donation
    {
        $donation->update($data);

        return $donation->fresh(['user', 'campaign']);
    }
}
