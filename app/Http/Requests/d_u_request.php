<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class d_u_request extends FormRequest
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
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'role' => 'required|in:general_guard,teacher,director',
         ];
     }
     public function messages()
    {
        return [
            'name.required' => 'Le nom est requis.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser :max caractères.',
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.max' => 'L\'adresse e-mail ne peut pas dépasser :max caractères.',
            'role.required' => 'Le rôle est requis.',
            'role.in' => 'Le rôle doit être soit "Garde générale", "Professeur" ou "Directeur".', 
        ];
    }
}
