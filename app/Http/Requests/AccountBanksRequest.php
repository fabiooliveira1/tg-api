<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountBanksRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CtBc_idBanco' => 'required',
            'CtBc_idAgencia' => 'required',
            'CtBc_idContaBancaria' => 'required',
            'CtBc_Saldo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'CtBc_idBanco:required' => 'Código do banco necessário!',
            'CtBc_idAgencia:required' => 'Número da agência necessário!',
            'CtBc_idContaBancaria:required' => 'Número da conta bancária necessário!',
            'CtBc_Saldo:required' => 'Necessário informar o saldo inicial!'
        ];
    }
}
