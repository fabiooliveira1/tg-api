<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequiredsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'Rq_DescrRequeridos' => 'required'
        ];

        $alter = [
            'Rq_idRequeridos'       => 'unique:Requireds',
            'Rq_DescrRequeridos'    => 'required|unique:Requireds'
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
            'Rq_DescrRequeridos.required'   => 'Necessário informar a descrição',
            'Rq_DescrRequeridos.unique'     => 'Este requerido já existe',
            'Rq_idRequeridos.unique'        => 'Este requerido já existe'
        ];
    }
}
