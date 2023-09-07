<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Info(
 *     title="Patchstack API",
 *     version="1.0",
 *     description="CRUD API for Vulnerabilities",
 *     @OA\Contact(
 *         email="jonaspauleta2@gmail.com"
 *     )
 * )
 */
class ApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api",
     *     summary="Get API status",
     *     tags={"API"},
     *     @OA\Response(
     *         response=200,
     *         description="API status",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="OK"),
     *             @OA\Property(property="timestamp", type="string", format="date-time"),
     *         ),
     *     ),
     * )
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return response()->json([
            'status' => 'OK',
            'timestamp' => Carbon::now(),
        ], Response::HTTP_OK);
    }
}
