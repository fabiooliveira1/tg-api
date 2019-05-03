<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'Sim_idContaBancaria'       => 'required',
            'Sim_valSimulacao'          => 'required',
            'Sim_dataPagtoSimulacao'    => 'required',
            'Sim_valTotal'              => 'required'
        ];

        $alter = [
            'Sim_idSimulacao' => 'unique:Simulations',
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
            'Sim_idContaBancaria.required'      => 'Necessário informar o id da conta',
            'Sim_valSimulacao.required'         => 'Necessário informar o valor simulado',
            'Sim_dataPagtoSimulacao.required'   => 'Necessário informar a data simulada',
            'Sim_valTotal.required'             => 'Necessário informar o valor total',
            'Sim_idSimulacao.unique'            => 'Esta simulacao já existe'
        ];
    }
}
