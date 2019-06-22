<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountBankRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'CtBc_numContaBancaria' => 'required',
            'CtBc_idAgencia'        => 'required',
            'CtBc_Saldo'            => 'required'
        ];

        $alter = ['CtBc_numContaBancaria'   => 'required|unique:AccountBanks'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'CtBc_numContaBancaria.required'    => 'Código do banco necessário!',
            'CtBc_numContaBancaria.unique'      => 'Este numero de conta bancária já existe',
            'CtBc_Saldo.required'               => 'Necessário informar o saldo inicial',
            'CtBc_idAgencia.required'           => 'Número da agência necessário!'
        ];
    }
}
