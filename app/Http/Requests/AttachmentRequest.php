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
        $image_ext = ['jpg', 'jpeg', 'png'];
        $document_ext = ['doc', 'docx', 'pdf', 'odt', 'xls', 'xlsx'];

        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', array_merge($image_ext, $document_ext));

        return [
            'id'            => 'required',
            'files'         => 'required|array',
            'files.*.name'  => 'required',
            'files.*.file'  => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        ];
    }

    public function messages()
    {
        return [
            'Anx_idConta.required'  => 'Necessário informar código da conta',
            'name.required'         => 'Necessário anexar o arquivo',
            'file.required'         => 'Necessário anexar o arquivo'

        ];
    }
    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    private function allExtensions()
    {
        return ;
    }
}