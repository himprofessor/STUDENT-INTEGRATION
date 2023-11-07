<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(["message" => $validator->errors()], 412));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            "first_name" =>"required|min:1|max:100",
            "last_name" =>"required|min:1|max:100",
            "email" =>"required|min:10|max:100",
            "position" =>"required",
            "phone" =>"required",
            "start_date" =>"required",
            "end_date" =>"required",
            "department_id" =>"required",
            "about" =>"required",
        ];
        return $rules;
    }
}