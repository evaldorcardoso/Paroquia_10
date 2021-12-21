<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CongregationRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:200',
            'pastor' => 'required|string|max:100',
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'active' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'address.required' => 'O campo endereço é obrigatório',
            'address.max' => 'O campo endereço deve ter no máximo 200 caracteres',
            'pastor.required' => 'O campo pastor é obrigatório',
            'pastor.max' => 'O campo pastor deve ter no máximo 100 caracteres',
            'lat.required' => 'O campo latitude é obrigatório',
            'lat.numeric' => 'O campo latitude deve ser um número',
            'lon.required' => 'O campo longitude é obrigatório',
            'lon.numeric' => 'O campo longitude deve ser um número',
            'active.required' => 'O campo ativo é obrigatório',
            'active.boolean' => 'O campo ativo deve ser um valor booleano'
        ];
    }
}
