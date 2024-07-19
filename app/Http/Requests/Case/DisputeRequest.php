<?php

namespace App\Http\Requests\Case;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class DisputeRequest extends FormRequest
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
            "title" => "required|string|min:3",
            "type" => "required|string",
            "summary" => "required|min:10",
            "background_info" => "required|min:10",
            "relief_sought" => "required|min:10",
            "specific_claims" => "required|min:10",
            "negotiation_terms" => "required|min:10",
            "accused_party" => "required",
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
