<?php

namespace App\Services\DonorProfile;

use App\Models\DonorProfile;

class DonorProfileShowService
{
    public function run(DonorProfile $donorProfile): DonorProfile
    {
        return $donorProfile->load(['user', 'address']);
    }
}
