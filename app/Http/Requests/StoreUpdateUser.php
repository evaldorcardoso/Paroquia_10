<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUser extends FormRequest
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
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:100'
            ],
            'address' => [
                'required',
                'min:3',
                'max:200'
            ],
            'shepherd' => [
                'required',
                'min:3',
                'max:200'
            ]            
        ];

        return $rules;
    }

    public function messages(){
        return [
            'name.required' => 'Nome é obrigatório'
        ];
    }    
}
