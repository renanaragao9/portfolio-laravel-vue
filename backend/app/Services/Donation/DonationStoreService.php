<?php

namespace App\Services\Donation;

use App\Models\Donation;

class DonationStoreService
{
    public function run(array $data): Donation
    {
        return Donation::create($data);
    }
}
