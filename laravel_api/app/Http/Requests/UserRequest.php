<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:100',            
            'password' => 'string|min:6|confirmed',
        ];

        switch($this->method())
        {
            case 'POST':
            {
                return array_merge($rules, [
                    'email' => 'required|string|email|max:100|unique:users,email',
                ]);
            }
            case 'PUT':
            {
                return array_merge($rules, [
                    'email' => 'required|string|email|max:100|unique:users,email,'.$this->id,
                ]);
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'email.max' => 'O campo email deve ter no máximo 100 caracteres',
            'email.unique' => 'O email informado já está cadastrado',
            'password.min' => 'O campo senha deve ter no mínimo 6 caracteres',
            'password.confirmed' => 'O campo senha e a confirmação da senha devem ser iguais',
            'active.required' => 'O campo ativo é obrigatório',
            'active.boolean' => 'O campo ativo deve ser um valor booleano'
        ];
    }
}
