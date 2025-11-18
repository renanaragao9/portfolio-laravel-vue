<?php

namespace App\Services\OngProfile;

use App\Models\OngProfile;
use Illuminate\Pagination\LengthAwarePaginator;

class OngProfileIndexService
{
    public function run(array $data = []): LengthAwarePaginator
    {
        return OngProfile::with(['user', 'address'])->paginate($data['per_page'] ?? 15);
    }
}
