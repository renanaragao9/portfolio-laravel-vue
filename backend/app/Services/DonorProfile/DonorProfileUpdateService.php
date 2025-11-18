<?php

namespace App\Services\DonorProfile;

use App\Models\DonorProfile;

class DonorProfileUpdateService
{
    public function run(DonorProfile $donorProfile, array $data): DonorProfile
    {
        $donorProfile->update($data);

        return $donorProfile->fresh(['user', 'address']);
    }
}
