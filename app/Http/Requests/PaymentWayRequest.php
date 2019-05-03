<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentWayRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'FrPg_descrFormaPgto' => 'required'
        ];

        $alter = ['FrPg_descrFormaPgto' => 'required|unique:Payment_Ways'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'FrPg_descrFormaPgto.required' => 'Necessário informa a forma de pagamento!',
            'FrPg_descrFormaPgto.unique' => 'A forma de pagamento já existe!'
        ];
    }
}
