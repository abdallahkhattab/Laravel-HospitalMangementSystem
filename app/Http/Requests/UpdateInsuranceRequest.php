<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInsuranceRequest extends FormRequest
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
        $insuranceId = $this->route('insurance'); // Assuming route model binding with {insurance}
        return [
            'insurance_code' => [
                'required',
                'string',
                Rule::unique('insurances', 'insurance_code')->ignore($insuranceId),
            ],
            'discount_percentage' => 'required|numeric',
            'Company_rate' => 'required|numeric',
            'name' => [
                'required',
                'string',
                Rule::unique('insurance_translations', 'name')->ignore($insuranceId),
            ],
            'notes' => 'nullable|string',
            'status' => 'sometimes|boolean', // Optional, defaults to 0 if not sent
            // Add other fields as needed
        ];
    }
}
