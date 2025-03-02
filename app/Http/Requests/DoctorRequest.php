<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
    public function rules()
    {
        $doctorId = $this->route('doctor'); // Get the doctor ID from route model binding
    
        return [
            'section_id' => 'required|exists:sections,id',
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('doctors', 'email')->ignore($doctorId),
            ],
            'password' => 'sometimes|nullable|string|min:6', // Adjusted for update scenario
            'phone' => 'nullable',
            'price' => 'required',
            'status' => 'required|boolean',
            'appointments' => 'nullable|array',
            'appointments.*' => 'string',
        ];
    }
}
