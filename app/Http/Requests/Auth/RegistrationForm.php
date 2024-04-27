<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class RegistrationForm extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "phone" => "required|string|unique:users,phone",
            "first_name" => "required|string|min:3|max:191",
            "middle_name" => "nullable|string|min:3|max:191",
            "last_name" => "required|string|min:3|max:191",
            "password" => ["required", Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(), "confirmed"],
            "display_picture" => "nullable|mimes:png,jpg|max:2048",
            "union" => "required|integer",
            "union_branch" => "required|integer",
            "organization" => "required|integer",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => Response::HTTP_UNAUTHORIZED,
            'message' => 'Validation errors',
            'error' => $validator->errors()
        ], Response::HTTP_UNAUTHORIZED));
    }
}
