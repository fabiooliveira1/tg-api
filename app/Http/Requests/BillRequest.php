<?php

namespace App\Http\Requests;

class BillRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rs = request();
        $validacao = [
            'requireds' => 'required'
        ];
        // $requireds ['Cta_valConta', ]
        foreach($this->requireds as $r) {
            $validacao[r] = 'required';
        }
    }

    public function messages()
    {
        return [
            'Cta_idUser.required'           => 'Precisa informar o id do usuário',
            'Cta_idGrupo.required'          => 'Necessário informar o id do grupo',
            'Cta_idFornecedor.required'     => 'Necessário informar o id do fornecedor',
            'Cta_descrConta.required'       => 'Informar a descrição com no máximo 100 caracteres',
            'Cta_dataEmissao.required'      => 'Necessário informar a data de emissão',
            'Cta_dataVencimento.required'   => 'Necessário informar a data de vencimento',
            'Cta_codBarra.required'         => 'Informar o código de barras com no máximo 200 caracteres',
            'Cta_valConta.required'         => 'Precisa informar o valor da conta',
            'Cta_totalConta.required'       => 'Precisa informar o valor total',
            'Cta_tempoProtesto.required'    => 'Necessário informar o tempo para protesto',
            'Cta_valProtesto.required'      => 'Necessário informar o valor do protesto'
        ];
    }
}
