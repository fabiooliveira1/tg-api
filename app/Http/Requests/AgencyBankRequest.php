<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgencyBankRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'AgBc_idBanco'      => 'required',
            'AgBc_numAgencia'   => 'required',
            'AgBc_nomeAgencia'  => 'required'
        ];

        $alter = ['AgBc_numAgencia'   => 'required|unique:BankingAgencies'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'AgBc_idBanco.required'     => 'Código do banco necessário!',
            'AgBc_numAgencia.required'  => 'Número da agência necessário!',
            'AgBc_numAgencia.unique'    => 'Este numero de agencia já existe',
            'AgBc_nomeAgencia.required' => 'Nome da agência necessário!'
        ];
    }
}
