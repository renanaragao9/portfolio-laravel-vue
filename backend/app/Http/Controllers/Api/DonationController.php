<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Donation\StoreDonationRequest;
use App\Http\Requests\Donation\UpdateDonationRequest;
use App\Http\Resources\Donation\DonationCollection;
use App\Http\Resources\Donation\DonationResource;
use App\Models\Donation;
use App\Services\Donation\DonationDestroyService;
use App\Services\Donation\DonationIndexService;
use App\Services\Donation\DonationShowService;
use App\Services\Donation\DonationStoreService;
use App\Services\Donation\DonationUpdateService;
use Illuminate\Http\JsonResponse;

class DonationController extends BaseController
{
    public function index(DonationIndexService $donationIndexService): JsonResponse
    {
        $data = request()->all();
        $donations = $donationIndexService->run($data);

        return $this->successResponse(
            new DonationCollection($donations),
            'Doações retornadas com sucesso'
        );
    }

    public function show(
        Donation $donation,
        DonationShowService $donationShowService
    ): JsonResponse {
        $donation = $donationShowService->run($donation);

        return $this->successResponse(
            new DonationResource($donation),
            'Doação retornada com sucesso'
        );
    }

    public function store(
        StoreDonationRequest $storeDonationRequest,
        DonationStoreService $donationStoreService
    ): JsonResponse {
        $data = $storeDonationRequest->validated();
        $donation = $donationStoreService->run($data);

        return $this->successResponse(
            new DonationResource($donation),
            'Doação criada com sucesso'
        );
    }

    public function update(
        UpdateDonationRequest $updateDonationRequest,
        Donation $donation,
        DonationUpdateService $donationUpdateService
    ): JsonResponse {
        $data = $updateDonationRequest->validated();
        $donation = $donationUpdateService->run($donation, $data);

        return $this->successResponse(
            new DonationResource($donation),
            'Doação atualizada com sucesso'
        );
    }

    public function destroy(
        Donation $donation,
        DonationDestroyService $donationDestroyService
    ): JsonResponse {
        $donationDestroyService->run($donation);

        return $this->successResponse(
            null,
            'Doação deletada com sucesso'
        );
    }
}
