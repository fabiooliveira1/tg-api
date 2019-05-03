<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        $validacao = [
            'Bc_numBanco'   => 'required',
            'Bc_nomeBanco'  => 'required'
        ];

        $alter = ['Bc_numBanco'   => 'required|unique:Banks'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'Bc_numBanco.required'  => 'Necessário informar o numero do banco',
            'Bc_numBanco.unique'    => 'Este numero de banco já existe',
            'Bc_nomeBanco.required' => 'Necessário informar o nome do banco'
        ];
    }
}
