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
        return [
            'CtBc_numContaBancaria' => 'required',
            'CtBc_idAgencia'        => 'required',
            'CtBc_Saldo'            => 'required'
        ];

    }

    public function messages()
    {
        return [
            'CtBc_numContaBancaria.required'    => 'Código do banco necessário!',
            'CtBc_Saldo.required'               => 'Necessário informar o saldo inicial',
            'CtBc_idAgencia.required'           => 'Número da agência necessário!'
        ];
    }
}
