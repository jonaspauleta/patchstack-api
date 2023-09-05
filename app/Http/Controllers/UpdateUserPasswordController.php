<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdateUserPasswordController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function __invoke(UpdateUserPasswordRequest $request): Response
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->noContent();
    }
}
