<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'User_nivelAcesso' => 'required',
            'User_matricula' => 'required',
            'User_senha' => 'required',
            'User_nome' => 'required',
            'User_email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'User_nivelAcesso:required' => 'Necessário informar o nivel de acesso',
            'User_matricula:required' => 'Necessário informar a matricula',
            'User_senha:required' => 'Necessário informar a senha',
            'User_nome:required' => 'Necessário informar o nome',
            'User_email:required' => 'Necessário informar o email'
        ];
    }
}
