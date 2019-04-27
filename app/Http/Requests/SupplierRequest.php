<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Forn_idFornecedor' => 'required',
            'Forn_CNPJ' => 'required',
            'Forn_idRisco' => 'required',
            'Forn_RazaoSocial' => 'required',
            'Forn_InscrEstadual' => 'required',
            'Forn_Banco' => 'required',
            'Forn_Agencia' => 'required',
            'Forn_ContaBancaria' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Forn_idFornecedor:required' => 'Necessário informar o fornecedor',
            'Forn_CNPJ:required' => 'Necessário informar o CNPJ',
            'Forn_idRisco:required' => 'Necessário informar o risco',
            'Forn_RazaoSocial:required' => 'Necessário informar a razão social',
            'Forn_InscrEstadual:required' => 'Necessário informar a inscrição estadual',
            'Forn_Banco:required' => 'Necessário informar o banco',
            'Forn_Agencia:required' => 'Necessário informar a agencia',
            'Forn_ContaBancaria:required' => 'Necessário informar a conta bancária'
        ];
    }
}