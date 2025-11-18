<?php

namespace App\Services\DonorProfile;

use App\Models\DonorProfile;
use Illuminate\Pagination\LengthAwarePaginator;

class DonorProfileService
{
    public function index(array $data = []): LengthAwarePaginator
    {
        return DonorProfile::with(['user', 'address'])->paginate($data['per_page'] ?? 15);
    }

    public function show(int $id): DonorProfile
    {
        return DonorProfile::with(['user', 'address'])->findOrFail($id);
    }

    public function store(array $data): DonorProfile
    {
        return DonorProfile::create($data);
    }

    public function update(int $id, array $data): DonorProfile
    {
        $donorProfile = DonorProfile::findOrFail($id);
        $donorProfile->update($data);

        return $donorProfile->fresh(['user', 'address']);
    }

    public function destroy(int $id): bool
    {
        $donorProfile = DonorProfile::findOrFail($id);

        return $donorProfile->delete();
    }
}
