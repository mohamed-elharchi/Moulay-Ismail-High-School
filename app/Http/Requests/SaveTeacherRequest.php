<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTeacherRequest extends FormRequest
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
            'admin_id' => 'required|exists:admins,id',
            'matiere_id' => 'required|exists:matieres,id',
            'departement_ids' => 'array',
            'departement_ids.*' => 'exists:departements,id',
        ];
    }

    public function messages()
    {
        return [
            'admin_id.required' => 'The teacher is required.',
            'admin_id.exists' => 'The selected teacher ID is invalid.',
            'matiere_id.required' => 'The matiere is required.',
            'matiere_id.exists' => 'The selected matiere is invalid.',
            'departement_ids.array' => 'The department must be an array.',
            'departement_ids.*.exists' => 'One or more selected department are invalid.',
        ];
    }
}
