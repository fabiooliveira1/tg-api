<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenegotiationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'Rng_idConta'       => 'required',
            'Rng_valProposta'   => 'required',
            'Rng_vencProposta'  => 'required',
            'Rng_valAntigo'     => 'required',
            'Rng_vencAntigo'    => 'required'
        ];

        $alter = ['Rng_idProposta' => 'required|unique:Renegotiations'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'Rng_idProposta.unique'     => 'A proposta ja existe',
            'Rng_idConta.required'      => 'Necessário informar a conta',
            'Rng_valProposta.required'  => 'Necessário informar o valor proposto',
            'Rng_vencProposta.required' => 'Necessário informar o vencimento',
            'Rng_valAntigo.required'    => 'Necessário informar o valor antigo',
            'Rng_vencAntigo.required'   => 'Necessário informar o vendimento antigo'
        ];
    }
}
