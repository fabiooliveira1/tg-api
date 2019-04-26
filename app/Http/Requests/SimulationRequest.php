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
        return [
            'Sim_valSimulacao' => 'required',
            'Sim_dataPagtoSimulacao' => 'required',
            'Sim_valTotal' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Sim_valSimulacao:required' => 'Necessário informar o valor simulado',
            'Sim_dataPagtoSimulacao:required' => 'Necessário informar a data simulada',
            'Sim_valTotal:required' => 'Necessário informar o valor total'
        ];
    }
}