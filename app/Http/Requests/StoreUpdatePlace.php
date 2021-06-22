<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class StoreUpdatePlace extends FormRequest
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
            'nome' => [
                'required',
                'min:3',
                'max:100'
            ],
            'localidade' => [
                'required',
                'min:3',
                'max:100'
            ],
            'pastor' => [
                'required',
                'min:3',
                'max:100'
            ],
            'imagem' => [
                'nullable',
                'image'
            ]        
        ];
        
        return $rules;
        //return [
            //
        //];
    }

    public function messages(){
        return [
            'nome.required' => 'Nome é obrigatório'
        ];
    }
}
