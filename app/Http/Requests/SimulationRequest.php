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
        if ($this->isMethod('PUT')) {
            return [
                'id' => 'required',
                'Sim_status' => 'required'
            ];
        }

        return [
            'Sim_idContaBancaria'       => 'required',
            'Sim_valSimulacao'          => 'required',
            'Sim_dataPagtoSimulacao'    => 'required',
            'Sim_valTotal'              => 'required',
            'bills'                     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Sim_idContaBancaria.required'      => 'Necessário informar o id da conta',
            'Sim_valSimulacao.required'         => 'Necessário informar o valor simulado',
            'Sim_dataPagtoSimulacao.required'   => 'Necessário informar a data simulada',
            'Sim_valTotal.required'             => 'Necessário informar o valor total',
            'id.required'          => 'Necessário informar o id',
            'Sim_status.required'               => 'Necessário informar o status',
            'bills.required'                    => 'Necessário informar as contas simuladas'
        ];
    }
}
