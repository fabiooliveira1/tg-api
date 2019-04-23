<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Cta_valConta' => 'required'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'value:required' => 'Valor é preciso'
    //     ];
    // }
}