<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AmbulanceRequest extends FormRequest
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
        $ambulanceId = $this->route('ambulance')?->id; // Get the ambulance ID from route model binding
    
        return [
            'driver_name' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'car_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('ambulances', 'car_number')->ignore($ambulanceId),
            ],
            'car_model' => 'required|string|max:100',
            'car_year_made' => 'required|integer|min:1900|max:' . date('Y'),
            'driver_license_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('ambulances', 'driver_license_number')->ignore($ambulanceId),
            ],
            'driver_phone' => ['required', 'string', 'max:20', 'regex:/^[\+0-9\-\(\)\s]*$/'],
            'car_type' => 'required|boolean',
            'is_available' => 'sometimes|boolean',
        ];
    }
    

}
