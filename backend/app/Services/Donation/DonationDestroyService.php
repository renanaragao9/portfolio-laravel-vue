<?php

namespace App\Services\Donation;

use App\Models\Donation;

class DonationDestroyService
{
    public function run(Donation $donation): bool
    {
        return $donation->delete();
    }
}
