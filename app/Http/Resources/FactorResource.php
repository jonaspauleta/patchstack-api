<?php

namespace App\Http\Resources;

use App\Models\Factor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="FactorResource",
 *     type="object",
 *
 *     @OA\Property(property="id", type="integer", example="1"),
 *     @OA\Property(property="name", type="string", example="Factor Name"),
 *     @OA\Property(property="value", type="float", example="5.5"),
 * )
 */

/**
 * Class FactorResource
 *
 * @mixin Factor
 */
class FactorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
