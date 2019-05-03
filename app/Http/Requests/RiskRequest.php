<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RiskRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'Rsc_descrRisco' => 'required'
        ];

        $alter = [
            'Rsc_idRisco'       => 'unique:Risks',
            'Rsc_descrRisco'    => 'required|unique:Risks'
        ];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'Rsc_descrRisco.required'   => 'Necessário informar a descrição!',
            'Rsc_descrRisco.unique'     => 'O risco já existe!',
            'Rsc_idRisco.required'      => 'Este risco já existe!'
        ];
    }
}
