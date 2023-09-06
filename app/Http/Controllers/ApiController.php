<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return response()->json([
            'status' => 'OK',
            'timestamp' => Carbon::now(),
        ], Response::HTTP_OK);
    }
}
