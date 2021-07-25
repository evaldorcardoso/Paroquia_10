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
                'min:5',
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
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Nome deve ter no mínimo 3 caracteres',
            'name.max' => 'Nome deve ter no máximo 100 caracteres',
            'address.required' => 'Endereço é obrigatório',
            'address.min' => 'Endereço deve ter no mínimo 3 caracteres',
            'address.max' => 'Endereço deve ter no máximo 200 caracteres',
            'shepherd.required' => 'Shepherd é obrigatório',
            'shepherd.min' => 'Shepherd deve ter no mínimo 3 caracteres',
            'shepherd.max' => 'Shepherd deve ter no máximo 200 caracteres'
        ];
    }    
}
