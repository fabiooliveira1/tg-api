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
        return [
            'FrPg_descrFormaPgto' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'FrPg_descrFormaPgto.required' => 'Necessário informa a forma de pagamento!'
        ];
    }
}
