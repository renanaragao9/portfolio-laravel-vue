<?php

namespace App\Services\OngProfile;

use App\Models\OngProfile;

class OngProfileUpdateService
{
    public function run(OngProfile $ongProfile, array $data): OngProfile
    {
        $ongProfile->update($data);

        return $ongProfile->fresh(['user', 'address']);
    }
}
