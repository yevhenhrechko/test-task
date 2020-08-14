<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class NameValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first-name' => 'required',
            'second-name' => 'required',
        ];
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        throw new HttpResponseException(response()->json([
            'errors' => $errors,
        ], JsonResponse::HTTP_BAD_REQUEST));
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'first-name.required' => 'First Name is required',
            'second-name.required' => 'Second Name is required',
        ];
    }
}
