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
        return [
            'Rsc_descrRisco' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Rsc_descrRisco.required' => 'Necessário informar a descrição!'
        ];
    }
}
