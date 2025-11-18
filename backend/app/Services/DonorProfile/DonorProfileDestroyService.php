<?php

namespace App\Services\DonorProfile;

use App\Models\DonorProfile;

class DonorProfileDestroyService
{
    public function run(DonorProfile $donorProfile): bool
    {
        return $donorProfile->delete();
    }
}
