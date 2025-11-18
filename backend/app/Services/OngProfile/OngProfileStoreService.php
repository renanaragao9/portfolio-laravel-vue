<?php

namespace App\Services\OngProfile;

use App\Models\OngProfile;

class OngProfileStoreService
{
    public function run(array $data): OngProfile
    {
        return OngProfile::create($data);
    }
}
