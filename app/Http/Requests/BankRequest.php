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
        return [
            'Bc_numBanco'   => 'required',
            'Bc_nomeBanco'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Bc_numBanco.required'  => 'Necessário informar o numero do banco',
            'Bc_nomeBanco.required' => 'Necessário informar o nome do banco'
        ];
    }
}
