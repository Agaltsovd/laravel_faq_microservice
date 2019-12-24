<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'name' => 'required|unique|string',
            'sort_weight' => 'required|integer',
            'is_active'=>'required|boolean',
            'icon_url'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'sort_weight.integer' => 'Sort weight must be numeric value',
            'name.required'=>'We need you name',
        ];
    }
}
