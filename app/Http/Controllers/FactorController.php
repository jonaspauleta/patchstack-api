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
    /**
     * Display a listing of the resource.
     */
    public function index(Vulnerability $vulnerability): Response
    {
        return response()->json(
            FactorResource::collection($vulnerability->factors()->get()),
            Response::HTTP_OK,
        );
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Vulnerability $vulnerability, Factor $factor): Response
    {
        return response()->json(
            FactorResource::make($factor),
            Response::HTTP_OK,
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactorRequest $request, Vulnerability $vulnerability, Factor $factor)
    {
        $factor = $factor->update(
            $request->validated()
        );

        return response()->json(
            FactorResource::make($factor),
            Response::HTTP_OK,
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vulnerability $vulnerability, Factor $factor)
    {
        $factor->delete();

        return response()->json([
            'message' => 'Factor deleted successfully',
        ], Response::HTTP_OK);
    }
}
