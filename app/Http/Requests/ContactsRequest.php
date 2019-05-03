<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validacao = [
            'Cnt_idFornecedor'  => 'required',
            'Cnt_nomeContato'   => 'required',
            'Cnt_phoneContato'  => 'required',
            'Cnt_emailContato'  => 'required'
        ];

        $alter = ['Cnt_emailContato'   => 'required|unique:Contacts'];

        if ($this->isMethod('PUT')) {
            return $validacao;
        } else {
            return array_replace($validacao, $alter);
        }
    }

    public function messages()
    {
        return [
            'Cnt_idFornecedor.required' => 'Necessário informar o Fornecedor!',
            'Cnt_nomeContato.required'  => 'Necessário informar o nome!',
            'Cnt_phoneContato.required' => 'Necessário informar o telefone!',
            'Cnt_emailContato.required' => 'Necessário informar o email!',
            'Cnt_emailContato.unique'   => 'O email do fornecedor já existe!'
        ];
    }
}
