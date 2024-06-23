<?php

namespace App\Http\Requests\UnionSubBranch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CreateUnionSubBranchRequest extends FormRequest
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
        $rules =  [
            "name" => "required|string|min:3|max:191",
            "acronym" => "nullable|string|min:3|max:191",
            "industry_id" => "required|integer",
            "phone" => "required|string|min:3",
            "about" => "required|string|min:3",
            "founded_in" => "required|string|min:3",
        ];

        if (!request("sub_branch")) {
            $rules["union"] = "required|integer";
            $rules["branch"] = "required|integer";
            $rules["logo"] = "required|file|mimes:png,jpg|max:2048";
        }
        else {
            $rules["logo"] = "nullable|file|mimes:png,jpg|max:2048";
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
