<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserUpdateRequest extends FormRequest
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
        $id = $this->route('user');

        return [
            'name' => 'required|max:191',
            'cpf' => 'required|max:20|unique:users,cpf,'.$id,
            'email' => 'email|required|max:191|unique:users,email,'.$id,
        ];
    }

    public function messages()
    {
        return  [
            'name.required' => 'O campo nome é Obrigatório.',
            'name.max' => 'O campo nome deve conter no máximo 191 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser do tipo e-mail.',
            'email.unique' => 'O E-mail informado já possui cadastro.',
            'email.max' => 'O E-mail deve conter no máximo 191 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'O CPF informado já possui cadastro.',
        ];
    }
}
