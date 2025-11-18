<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DonorProfile\StoreDonorProfileRequest;
use App\Http\Requests\DonorProfile\UpdateDonorProfileRequest;
use App\Http\Resources\DonorProfile\DonorProfileCollection;
use App\Http\Resources\DonorProfile\DonorProfileResource;
use App\Models\DonorProfile;
use App\Services\DonorProfile\DonorProfileDestroyService;
use App\Services\DonorProfile\DonorProfileIndexService;
use App\Services\DonorProfile\DonorProfileShowService;
use App\Services\DonorProfile\DonorProfileStoreService;
use App\Services\DonorProfile\DonorProfileUpdateService;
use Illuminate\Http\JsonResponse;

class DonorProfileController extends BaseController
{
    public function index(DonorProfileIndexService $donorProfileIndexService): JsonResponse
    {
        $data = request()->all();
        $donorProfiles = $donorProfileIndexService->run($data);

        return $this->successResponse(
            new DonorProfileCollection($donorProfiles),
            'Perfis de doadores retornados com sucesso'
        );
    }

    public function show(
        DonorProfile $donorProfile,
        DonorProfileShowService $donorProfileShowService
    ): JsonResponse {
        $donorProfile = $donorProfileShowService->run($donorProfile);

        return $this->successResponse(
            new DonorProfileResource($donorProfile),
            'Perfil de doador retornado com sucesso'
        );
    }

    public function store(
        StoreDonorProfileRequest $soreDonorProfileRequest,
        DonorProfileStoreService $donorProfileStoreService
    ): JsonResponse {
        $data = $soreDonorProfileRequest->validated();
        $donorProfile = $donorProfileStoreService->run($data);

        return $this->successResponse(
            new DonorProfileResource($donorProfile),
            'Perfil de doador criado com sucesso'
        );
    }

    public function update(
        UpdateDonorProfileRequest $updateDonorProfileRequest,
        DonorProfile $donorProfile,
        DonorProfileUpdateService $donorProfileUpdateService
    ): JsonResponse {
        $data = $updateDonorProfileRequest->validated();
        $donorProfile = $donorProfileUpdateService->run($donorProfile, $data);

        return $this->successResponse(
            new DonorProfileResource($donorProfile),
            'Perfil de doador atualizado com sucesso'
        );
    }

    public function destroy(
        DonorProfile $donorProfile,
        DonorProfileDestroyService $donorProfileDestroyService
    ): JsonResponse {
        $donorProfileDestroyService->run($donorProfile);

        return $this->successResponse(
            null,
            'Perfil de doador deletado com sucesso'
        );
    }
}
