<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactorRequest;
use App\Http\Requests\UpdateFactorRequest;
use App\Models\Factor;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFactorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Factor $factor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactorRequest $request, Factor $factor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factor $factor)
    {
        //
    }
}
