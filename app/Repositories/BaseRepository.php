<?php

namespace App\Repositories;

use App\Http\Requests\PaginationRequest;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

class BaseRepository
{
    /**
     * @param PaginationRequest $request
     * @param QueryBuilder|Builder<Model> $queryBuilder
     *
     * @return Paginator
     */
    public function paginate(
        PaginationRequest $request,
        QueryBuilder|Builder $queryBuilder,
    ): Paginator {
        return $queryBuilder
            ->paginate($request->getLimit())
            ->appends($request->query());
    }
}
