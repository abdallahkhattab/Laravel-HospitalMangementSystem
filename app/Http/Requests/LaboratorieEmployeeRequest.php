<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorieEmployeeRequest extends FormRequest
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
        $id = $this->route('manage_laboratorie_employee'); // Get employee ID

        return [
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:ray_employees,email,$id",
            'password' => $this->isMethod('patch') || $this->isMethod('put') 
                ? 'nullable|string|min:8' // Password is optional in update
                : 'required|string|min:8', // Password is required when creating
   
        ];
    }
}
