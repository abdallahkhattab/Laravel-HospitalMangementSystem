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
    public function rules(): array
    {

       // Get the doctor ID from the route (e.g., /doctors/{doctor})
       $doctorId = $this->route('doctor') ? $this->route('doctor')->id ?? $this->route('doctor') : null;

       return [
           'section_id' => 'required|exists:sections,id',
           'name' => 'sometimes|string|max:255',
           'email' => [
               'sometimes',
               'email',
               Rule::unique('doctors')->ignore($doctorId), // Ignore current doctor's ID
           ],
           'password' => 'nullable|string|min:8', // Optional, but enforce min length if provided
           'phone' => 'nullable|string',
           'price' => 'sometimes|numeric|min:0',
           'status' => 'sometimes|boolean',
           'appointments' => 'nullable|array',
           'appointments.*' => 'string',
       ];
    
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already taken by another doctor.',
        ];
    }
}
