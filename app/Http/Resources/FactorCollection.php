<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FactorCollection",
 *     type="object",
 *
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *
 *         @OA\Items(ref="#/components/schemas/FactorResource")
 *     ),
 *
 *     @OA\Property(
 *         property="pagination",
 *         type="object",
 *         @OA\Property(property="total", type="integer"),
 *         @OA\Property(property="count", type="integer"),
 *         @OA\Property(property="per_page", type="integer"),
 *         @OA\Property(property="current_page", type="integer"),
 *         @OA\Property(property="total_pages", type="integer"),
 *         @OA\Property(property="next_page_url", type="string", format="uri"),
 *         @OA\Property(property="prev_page_url", type="string", format="uri"),
 *     ),
 * )
 */

/**
 * Class VulnerabilityResource
 *
 * @mixin LengthAwarePaginator
 */
class FactorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'data' => $this->collection->map(function (FactorResource $factorResource) use ($request) {
                return $factorResource->toArray($request);
            }),
        ];

        if ($this->resource instanceof LengthAwarePaginator) {
            $data['pagination'] = [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
                'next_page_url' => $this->nextPageUrl(),
                'prev_page_url' => $this->previousPageUrl(),
            ];
        }

        return $data;
    }
}
