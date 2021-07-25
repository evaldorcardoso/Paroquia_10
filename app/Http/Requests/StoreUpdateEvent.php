<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEvent extends FormRequest
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
            'title' => [
                'required',
                'min:5',
                'max:50'                
            ],
            'address' => [
                'required',
                'min:5',
                'max:100'
            ]
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Título é obrigatório',
            'title.min' => 'Título deve ter no mínimo 5 caracteres',
            'title.max' => 'Título deve ter no máximo 50 caracteres',
            'address' => 'Endereço é obrigatório',
            'address.min' => 'Endereço deve ter no mínimo 5 caracteres',
            'address.max' => 'Endereço deve ter no máximo 100 caracteres'
        ];
    }
}
