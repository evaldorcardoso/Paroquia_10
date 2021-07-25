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
            'event_at_d' => [
                'required',
                'date'
            ],        
            'event_at_h' => [        
                'required',
                'date_format:H:i'
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
            'event_at_d.required' => 'Data do evento é obrigatório',
            'event_at_d.date' => 'Data do evento deve ser uma data válida',
            'event_at_h.required' => 'Hora do evento é obrigatório',
            'event_at_h.time' => 'Hora do evento deve ser uma hora válida',
            'address' => 'Endereço é obrigatório',
            'address.min' => 'Endereço deve ter no mínimo 5 caracteres',
            'address.max' => 'Endereço deve ter no máximo 100 caracteres'
        ];
    }
}
