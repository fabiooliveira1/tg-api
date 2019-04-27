<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequeredsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Rq_DescrRequeridos' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Rq_DescrRequeridos:required' => 'Necessário informar a descrição'
        ];
    }
}