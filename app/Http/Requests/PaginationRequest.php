<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'per_page' => ['integer'],
            'page' => ['integer'],
        ];
    }

    public function getPage(): int
    {
        return (int) $this->query('page', '1');
    }

    public function getLimit(): int
    {
        $defaultPaginationSize = 10;
        $maxPaginationSize = 100;

        $requestedPaginationSize = (int) $this->query('per_page');

        if (
            $requestedPaginationSize &&
            ($requestedPaginationSize >= 1 && $requestedPaginationSize <= $maxPaginationSize)
        ) {
            return $requestedPaginationSize;
        }

        return $defaultPaginationSize;
    }
}
