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
         //
        'section_id' => 'required|exists:sections,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors,email',
        'password' => 'required',
        'phone' => 'nullable',
        'price' => 'required',
        'status' => 'required|boolean',
        'appointments' => 'nullable|array', // Updated for array/JSON
        'appointments.*' => 'string', // Validate each appointment
        ];
    }
}
