<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateUserPasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Get authenticated user details",
     *     tags={"User"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="User details",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/UserResource",
     *         ),
     *     ),
     * )
     */
    public function show(): Response
    {
        return response()->json(
            UserResource::make(Auth::user()),
            Response::HTTP_OK,
        );
    }

    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register a new user",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Test User"),
     *             @OA\Property(property="email", type="string", format="email", example="test@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User registered successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/UserResource",
     *         ),
     *     ),
     * )
     */
    public function store(RegisterRequest $request): Response
    {
        $user = User::create([
            ...$request->only(['name', 'email']),
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        return response()->json(
            UserResource::make($user),
            Response::HTTP_CREATED,
        );
    }

    /**
     * @OA\Put(
     *     path="/api/user",
     *     summary="Update user password",
     *     tags={"User"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="old_password", type="string", format="password", example="old_password"),
     *             @OA\Property(property="new_password", type="string", format="password", example="new_password"),
     *             @OA\Property(property="new_password_confirmation", type="string", format="password", example="new_password"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Password updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/UserResource",
     *         ),
     *     ),
     * )
     */
    public function update(UpdateUserPasswordRequest $request): Response
    {
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(
            UserResource::make($user),
            Response::HTTP_OK,
        );
    }
}
