<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Http\Resources\Tag\TagCollection;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use App\Services\Tag\TagDestroyService;
use App\Services\Tag\TagIndexService;
use App\Services\Tag\TagShowService;
use App\Services\Tag\TagStoreService;
use App\Services\Tag\TagUpdateService;
use Illuminate\Http\JsonResponse;

class TagController extends BaseController
{
    public function index(TagIndexService $tagIndexService): JsonResponse
    {
        $data = request()->all();
        $tags = $tagIndexService->run($data);

        return $this->successResponse(
            new TagCollection($tags),
            'Tags retornadas com sucesso'
        );
    }

    public function show(
        Tag $tag,
        TagShowService $tagShowService
    ): JsonResponse {
        $tag = $tagShowService->run($tag);

        return $this->successResponse(
            new TagResource($tag),
            'Tag retornada com sucesso'
        );
    }

    public function store(
        StoreTagRequest $storeTagRequest,
        TagStoreService $tagStoreService
    ): JsonResponse {
        $data = $storeTagRequest->validated();
        $tag = $tagStoreService->run($data);

        return $this->successResponse(
            new TagResource($tag),
            'Tag criada com sucesso'
        );
    }

    public function update(
        UpdateTagRequest $updateTagRequest,
        Tag $tag,
        TagUpdateService $tagUpdateService
    ): JsonResponse {
        $data = $updateTagRequest->validated();
        $tag = $tagUpdateService->run($tag, $data);

        return $this->successResponse(
            new TagResource($tag),
            'Tag atualizada com sucesso'
        );
    }

    public function destroy(
        Tag $tag,
        TagDestroyService $tagDestroyService
    ): JsonResponse {
        $tagDestroyService->run($tag);

        return $this->successResponse(
            null,
            'Tag deletada com sucesso'
        );
    }
}
