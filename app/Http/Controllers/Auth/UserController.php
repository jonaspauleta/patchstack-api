<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateUserPasswordRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function show(): Response
    {
        return response()->json(
            UserResource::make(Auth::user()),
            Response::HTTP_OK,
        );
    }

    public function update(UpdateUserPasswordRequest $request): Response
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->noContent();
    }
}
