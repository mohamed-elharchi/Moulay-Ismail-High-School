<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisplayAbsenceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'department_name' => 'required|exists:departements,name',
            'from_date_display' => 'required|date',
            'to_date_display' => 'required|date|after_or_equal:from_date_display',
        ];
    }
    public function messages()
    {
        return [
            'department_name.required' => 'Please select a department.',
            'department_name.exists' => 'The selected department does not exist.',
            'from_date_display.required' => 'Please select a from date.',
            'from_date_display.date' => 'The from date must be a valid date.',
            'to_date_display.required' => 'Please select a to date.',
            'to_date_display.date' => 'The to date must be a valid date.',
            'to_date_display.after_or_equal' => 'The to date must be equal to or after the from date.',
        ];
    }
}
