<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class departementRequest extends FormRequest
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
            'students_list' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',


        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name may not be greater than :max characters.',
            'students_list.image' => 'The file must be an image.',
            'students_list.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'students_list.max' => 'The image may not be greater than :max kilobytes.',
        ];
    }
}
