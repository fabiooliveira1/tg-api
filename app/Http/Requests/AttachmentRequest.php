<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Anx_idConta' => 'required',
            'Anx_conteudo' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'Anx_idConta:required' => 'Necessário informar código da conta!',
            'Anx_conteudo:required' => 'Necessário anexar o arquivo!'
            
        ];
    }
}