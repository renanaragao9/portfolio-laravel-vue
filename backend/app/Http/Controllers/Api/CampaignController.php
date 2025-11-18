<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Campaign\StoreCampaignRequest;
use App\Http\Requests\Campaign\UpdateCampaignRequest;
use App\Http\Resources\Campaign\CampaignCollection;
use App\Http\Resources\Campaign\CampaignResource;
use App\Models\Campaign;
use App\Services\Campaign\CampaignDestroyService;
use App\Services\Campaign\CampaignIndexService;
use App\Services\Campaign\CampaignShowService;
use App\Services\Campaign\CampaignStoreService;
use App\Services\Campaign\CampaignUpdateService;
use Illuminate\Http\JsonResponse;

class CampaignController extends BaseController
{
    public function index(CampaignIndexService $campaignIndexService): JsonResponse
    {
        $data = request()->all();
        $campaigns = $campaignIndexService->run($data);

        return $this->successResponse(
            new CampaignCollection($campaigns),
            'Campanhas retornadas com sucesso'
        );
    }

    public function show(
        Campaign $campaign,
        CampaignShowService $campaignShowService
    ): JsonResponse {
        $campaign = $campaignShowService->run($campaign);

        return $this->successResponse(
            new CampaignResource($campaign),
            'Campanha retornada com sucesso'
        );
    }

    public function store(
        StoreCampaignRequest $storeCampaignRequest,
        CampaignStoreService $campaignStoreService
    ): JsonResponse {
        $data = $storeCampaignRequest->validated();
        $campaign = $campaignStoreService->run($data);

        return $this->successResponse(
            new CampaignResource($campaign),
            'Campanha criada com sucesso'
        );
    }

    public function update(
        UpdateCampaignRequest $updateCampaignRequest,
        Campaign $campaign,
        CampaignUpdateService $campaignUpdateService
    ): JsonResponse {
        $data = $updateCampaignRequest->validated();
        $campaign = $campaignUpdateService->run($campaign, $data);

        return $this->successResponse(
            new CampaignResource($campaign),
            'Campanha atualizada com sucesso'
        );
    }

    public function destroy(
        Campaign $campaign,
        CampaignDestroyService $campaignDestroyService
    ): JsonResponse {
        $campaignDestroyService->run($campaign);

        return $this->successResponse(
            null,
            'Campanha deletada com sucesso'
        );
    }
}
