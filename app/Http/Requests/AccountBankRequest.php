<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountBankRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value' => 'required|number,nullable'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'value:required' => 'Valor é preciso'
    //     ];
    // }
}