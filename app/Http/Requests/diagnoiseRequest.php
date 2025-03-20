<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class diagnoiseRequest extends FormRequest
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
            'diagnosis' => ['required', 'string', 'max:5000'],
            'medicine' => ['required', 'string', 'max:5000'],
            'invoice_id' => ['required', 'exists:single_invoices,id'],
            'patient_id' => ['required', 'exists:patients,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'review_data' => ['nullable'],
        ];

    }
}
