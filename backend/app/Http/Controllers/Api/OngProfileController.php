<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OngProfile\StoreOngProfileRequest;
use App\Http\Requests\OngProfile\UpdateOngProfileRequest;
use App\Http\Resources\OngProfile\OngProfileCollection;
use App\Http\Resources\OngProfile\OngProfileResource;
use App\Models\OngProfile;
use App\Services\OngProfile\OngProfileDestroyService;
use App\Services\OngProfile\OngProfileIndexService;
use App\Services\OngProfile\OngProfileShowService;
use App\Services\OngProfile\OngProfileStoreService;
use App\Services\OngProfile\OngProfileUpdateService;
use Illuminate\Http\JsonResponse;

class OngProfileController extends BaseController
{
    public function index(OngProfileIndexService $ongProfileIndexService): JsonResponse
    {
        $data = request()->all();
        $ongProfiles = $ongProfileIndexService->run($data);

        return $this->successResponse(
            new OngProfileCollection($ongProfiles),
            'Perfis de ONGs retornados com sucesso'
        );
    }

    public function show(
        OngProfile $ongProfile,
        OngProfileShowService $ongProfileShowService
    ): JsonResponse {
        $ongProfile = $ongProfileShowService->run($ongProfile);

        return $this->successResponse(
            new OngProfileResource($ongProfile),
            'Perfil de ONG retornado com sucesso'
        );
    }

    public function store(
        StoreOngProfileRequest $storeOngProfileRequest,
        OngProfileStoreService $ongProfileStoreService
    ): JsonResponse {
        $data = $storeOngProfileRequest->validated();
        $ongProfile = $ongProfileStoreService->run($data);

        return $this->successResponse(
            new OngProfileResource($ongProfile),
            'Perfil de ONG criado com sucesso'
        );
    }

    public function update(
        UpdateOngProfileRequest $updateOngProfileRequest,
        OngProfile $ongProfile,
        OngProfileUpdateService $ongProfileUpdateService
    ): JsonResponse {
        $data = $updateOngProfileRequest->validated();
        $ongProfile = $ongProfileUpdateService->run($ongProfile, $data);

        return $this->successResponse(
            new OngProfileResource($ongProfile),
            'Perfil de ONG atualizado com sucesso'
        );
    }

    public function destroy(
        OngProfile $ongProfile,
        OngProfileDestroyService $ongProfileDestroyService
    ): JsonResponse {
        $ongProfileDestroyService->run($ongProfile);

        return $this->successResponse(
            null,
            'Perfil de ONG deletado com sucesso'
        );
    }
}
