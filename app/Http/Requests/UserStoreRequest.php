<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => 'required|max:191',
            'email' => 'required|unique:users|max:191',
            // 'cpf' => 'required|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'O campo nome é Obrigatório.',
            'first_name.max' => 'O campo nome deve conter no máximo 191 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser do tipo e-mail.',
            'email.unique' => 'O E-mail informado já possui cadastro.',
            'email.max' => 'O E-mail deve conter no máximo 191 caracteres.',
            // 'cpf.required' => 'O campo CPF é obrigatório.',
            // 'cpf.unique' => 'O CPF informado já possui cadastro.',
        ];
    }
}
