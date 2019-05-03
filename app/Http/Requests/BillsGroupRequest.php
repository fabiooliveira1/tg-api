<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillsGroupRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'GrCt_idRisco'      => 'required',
            'GrCt_NomeGrupo'    => 'required',
            'GrCt_DescrGrupo'   => 'required'
        ];

        $alter = ['GrCt_NomeGrupo'   => 'required|unique:Bills_group'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'GrCt_idRisco.required'     => 'Necessário informar o código do Risco!',
            'GrCt_NomeGrupo.required'   => 'Necessário informar o nome do grupo',
            'GrCt_NomeGrupo.unique'     => 'O nome do grupo já existe',
            'GrCt_DescrGrupo.required'  => 'Necessário informar a descrição'
        ];
    }
}
