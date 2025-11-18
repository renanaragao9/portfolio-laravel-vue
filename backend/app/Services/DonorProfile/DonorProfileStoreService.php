<?php

namespace App\Services\DonorProfile;

use App\Models\DonorProfile;

class DonorProfileStoreService
{
    public function run(array $data): DonorProfile
    {
        return DonorProfile::create($data);
    }
}
