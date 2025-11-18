<?php

namespace App\Services\OngProfile;

use App\Models\OngProfile;

class OngProfileDestroyService
{
    public function run(OngProfile $ongProfile): bool
    {
        return $ongProfile->delete();
    }
}
