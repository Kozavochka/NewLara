<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

abstract class ApiController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    //TODO обёртка на ответы
    //todo работа с пагинацией

    protected const DEFAULT_PAGE_PAGINATION = 1;

    protected const DEFAULT_PER_PAGE_PAGINATION = 20;

    protected function paginatedResponse(ResourceCollection $collection): JsonResponse
    {
        return response()->json([
           'status' => 'ok',
           'data' => $collection,
           'meta' => [
                'per_page' => $collection->resource->perPage(),
                'current_page' => $collection->resource->perPage(),
                'last_page' => $collection->resource->perPage(),
                'total' => $collection->resource->perPage(),
                'from' => $collection->resource->perPage(),
            ],
        ]);
    }

    protected function response(JsonResource|Collection|array|null $data = []): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'data' => $data
        ]);
    }

    protected function getPagePagination(): int
    {
        return request()->integer('page', self::DEFAULT_PAGE_PAGINATION);
    }

    protected function getPerPagePagination(): int
    {
        return request()->integer('per_page', self::DEFAULT_PAGE_PAGINATION);
    }
}
