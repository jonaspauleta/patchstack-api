<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactorRequest;
use App\Http\Requests\UpdateFactorRequest;
use App\Http\Resources\FactorResource;
use App\Models\Factor;
use App\Models\Vulnerability;
use Symfony\Component\HttpFoundation\Response;

class FactorController extends Controller
{
    public function index(Vulnerability $vulnerability): Response
    {
        return response()->json(
            FactorResource::collection($vulnerability->factors()->get()),
            Response::HTTP_OK,
        );
    }

    public function store(StoreFactorRequest $request, Vulnerability $vulnerability): Response
    {
        $factor = $vulnerability->factors()->create(
            $request->validated(),
        );

        return response()->json(
            FactorResource::make($factor),
            Response::HTTP_CREATED,
        );
    }

    public function show(Vulnerability $vulnerability, Factor $factor): Response
    {
        return response()->json(
            FactorResource::make($factor),
            Response::HTTP_OK,
        );
    }

    public function update(UpdateFactorRequest $request, Vulnerability $vulnerability, Factor $factor): Response
    {
        $factor = $factor->update(
            $request->validated()
        );

        return response()->json(
            FactorResource::make($factor),
            Response::HTTP_OK,
        );
    }

    public function destroy(Vulnerability $vulnerability, Factor $factor): Response
    {
        $factor->delete();

        return response()->json([
            'message' => 'Factor deleted successfully',
        ], Response::HTTP_OK);
    }
}
