<?php

namespace App\Repositories;

use App\Http\Requests\Vulnerability\Factor\ListFactorsRequest;
use App\Http\Requests\Vulnerability\Factor\ShowFactorRequest;
use App\Models\Factor;
use App\Models\Vulnerability;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\QueryBuilder;

class FactorRepository extends BaseRepository
{
    public function list(ListFactorsRequest $request, Vulnerability $vulnerability): Paginator
    {
        $query = QueryBuilder::for(Factor::class)
            ->where('vulnerability_id', $vulnerability->id);

        return $this->paginate($request, $query);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data, Vulnerability $vulnerability): Factor
    {
        return $vulnerability->factors()->create($data);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Factor $factor, array $data): bool
    {
        if (request()->user()->cannot('delete', Factor::class)) {
            return false;
        }

        return $factor->update($data);
    }

    public function show(ShowFactorRequest $request, Factor $factor): Factor
    {
        /**
         * @var Factor $query
         */
        $query = QueryBuilder::for(Factor::class)
            ->find($factor->id);

        return $query;
    }

    public function destroy(Factor $factor): bool
    {
        return $factor->delete();
    }
}
