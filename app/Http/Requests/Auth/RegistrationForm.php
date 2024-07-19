<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
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
        $rules = [
            "first_name" => "required|string|min:3|max:191",
            "middle_name" => "nullable|string|min:3|max:191",
            "last_name" => "required|string|min:3|max:191",
            "phone" => "required|string|unique:users,phone",
            // "password" => ["required", Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(), "confirmed"],
            "display_picture" => "nullable|file|mimes:png,jpg|max:2048",
            "union_member" => "required|in:yes,no",
        ];

        $role = get_user_roles(request()->user());

        if (empty($role)) {
            $rules["union"] = "required_if:union_member,yes|nullable|integer";
            $rules["union_branch"] = "required_if:union_member,yes|nullable|integer";
            $rules["organization"] = "required_if:union_member,yes|nullable|integer";
        }

        return $rules;
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
