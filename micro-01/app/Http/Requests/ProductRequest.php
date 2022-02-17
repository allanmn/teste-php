<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:products',
            'id_tags' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome precisa ser informado.',
            'id_tags.required' => 'O campo tags precisa ser informado.',
        ];
    }
}
