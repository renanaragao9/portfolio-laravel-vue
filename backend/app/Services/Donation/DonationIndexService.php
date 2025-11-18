<?php

namespace App\Services\Donation;

use App\Models\Donation;
use Illuminate\Pagination\LengthAwarePaginator;

class DonationIndexService
{
    public function run(array $data = []): LengthAwarePaginator
    {
        return Donation::with(['user', 'campaign'])->paginate($data['per_page'] ?? 15);
    }
}
