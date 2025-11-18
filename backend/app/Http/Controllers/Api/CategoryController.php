<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\Category\CategoryDestroyService;
use App\Services\Category\CategoryIndexService;
use App\Services\Category\CategoryShowService;
use App\Services\Category\CategoryStoreService;
use App\Services\Category\CategoryUpdateService;
use Illuminate\Http\JsonResponse;

class CategoryController extends BaseController
{
    public function index(CategoryIndexService $categoryIndexService): JsonResponse
    {
        $data = request()->all();
        $categories = $categoryIndexService->run($data);

        return $this->successResponse(
            new CategoryCollection($categories),
            'Categorias retornadas com sucesso'
        );
    }

    public function show(
        Category $category,
        CategoryShowService $categoryShowService
    ): JsonResponse {
        $category = $categoryShowService->run($category);

        return $this->successResponse(
            new CategoryResource($category),
            'Categoria retornada com sucesso'
        );
    }

    public function store(
        StoreCategoryRequest $storeCategoryRequest,
        CategoryStoreService $categoryStoreService
    ): JsonResponse {
        $data = $storeCategoryRequest->validated();
        $category = $categoryStoreService->run($data);

        return $this->successResponse(
            new CategoryResource($category),
            'Categoria criada com sucesso'
        );
    }

    public function update(
        UpdateCategoryRequest $updateCategoryRequest,
        Category $category,
        CategoryUpdateService $categoryUpdateService
    ): JsonResponse {
        $data = $updateCategoryRequest->validated();
        $category = $categoryUpdateService->run($category, $data);

        return $this->successResponse(
            new CategoryResource($category),
            'Categoria atualizada com sucesso'
        );
    }

    public function destroy(
        Category $category,
        CategoryDestroyService $categoryDestroyService
    ): JsonResponse {
        $categoryDestroyService->run($category);

        return $this->successResponse(
            null,
            'Categoria deletada com sucesso'
        );
    }
}
