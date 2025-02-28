<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'section_id' => 'required|exists:sections,id',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|min:8',
            'phone' => 'required|regex:/^[0-9+\-\s]*$/|min:10|max:15',
            'status' => 'required|boolean',
            'price' => 'required|numeric|min:0|max:999999.99',
        ];
    }
}
