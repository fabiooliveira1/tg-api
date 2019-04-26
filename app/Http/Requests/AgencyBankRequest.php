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
        return [
            'AgBc_idBanco' => 'required',
            'AgBc_idAgencia' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'AgBc_idBanco:required' => 'Código do banco necessário!',
            'AgBc_idAgencia:required' => 'Número da agência necessário!'
            
        ];
    }
}