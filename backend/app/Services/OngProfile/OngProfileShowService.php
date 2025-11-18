<?php

namespace App\Services\OngProfile;

use App\Models\OngProfile;

class OngProfileShowService
{
    public function run(OngProfile $ongProfile): OngProfile
    {
        return $ongProfile->load(['user', 'address']);
    }
}
