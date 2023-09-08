<?php

namespace App\Http\Requests\Traits;

use Illuminate\Validation\Rule;

trait Includable
{
    /**
     * @param  string[]  $includes
     * @return array<string, array<string|Rule>>
     */
    private function allowedIncludes(array $includes): array
    {
        return [
            'include' => ['array'],
            'include.*' => ['string', Rule::in($includes)],
        ];
    }
}
