<?php

namespace App\Services\DonorProfile;

use App\Models\DonorProfile;
use Illuminate\Pagination\LengthAwarePaginator;

class DonorProfileIndexService
{
    public function run(array $data = []): LengthAwarePaginator
    {
        return DonorProfile::with(['user', 'address'])->paginate($data['per_page'] ?? 15);
    }
}
