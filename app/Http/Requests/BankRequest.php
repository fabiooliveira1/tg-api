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
            'Bc_idBanco' => 'required',
            'Bc_nomeBanco' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'Bc_idBanco:required' => 'Necessário informar o código do banco!',
            'Bc_nomeBanco:required' => 'Necessário informar o nome do banco'
            
        ];
    }
}