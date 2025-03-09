<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
        $patientId = $this->route('patient'); // Assuming route model binding with {patient}

        return [
            'name' => 'required|string|max:255',
            'Address' => 'nullable|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('patients', 'email')->ignore($patientId),
            ],
            'Password' => 'sometimes|string|min:8', // Requires password_confirmation in the form
            'Date_Birth' => 'required|string|date' ,
            'Phone' => [
                'required',
                'string',
                'max:20',
                'regex:/^[\+0-9\-\(\)\s]*$/',
                Rule::unique('patients', 'Phone')->ignore($patientId),
            ],
            'Gender' => 'required', // Assuming these are the allowed values
            'Blood_Group' => 'required', // Common blood group options
        ];
    
    }
}
