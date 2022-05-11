<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Erros de Validação',
            'data' => $validator->errors()
        ], 400));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:50',
            'event_at' => 'required|date',
            'congregation_id' => 'required|integer',
            'address' => 'required|string|max:200'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'O campo título é obrigatório',
            'title.max' => 'O campo título deve ter no máximo 50 caracteres',
            'event_at.required' => 'O campo data é obrigatório',
            'event_at.date' => 'O campo data deve ser uma data válida',
            'congregation_id.required' => 'O campo congregação é obrigatório',
            'congregation_id.integer' => 'O campo congregação deve ser um número',
            'address.required' => 'O campo endereço é obrigatório',
            'address.max' => 'O campo endereço deve ter no máximo 200 caracteres'
        ];
    }

    public function prepareForValidation(){
        if(auth()->user())
        {
            $this->merge([
                'congregation_id' => auth()->user()->congregation->id,
                'event_at' => $this->event_at_d.' '.$this->event_at_h
            ]);        
        }
    }
}
