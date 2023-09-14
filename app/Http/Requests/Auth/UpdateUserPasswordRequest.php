<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Rules\OldPasswordCheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

/**
 * Class User
 *
 * @mixin User
 * */
class UpdateUserPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'old_password' => ['required', new OldPasswordCheck],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
