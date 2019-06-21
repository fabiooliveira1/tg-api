<?php

namespace App\Http\Controllers\Api\Attachment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\AttachmentsRepository;

class AttachmentsController extends BaseController
{
    private $image_ext = ['jpg', 'jpeg', 'png'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'xls', 'xlsx'];

    public function getRepository()
    {
        return app(AttachmentsRepository::class);
    }

    public function manage($bill, Request $request)
    {
        $idConta = $request->get('id');

        $tk = intval($request->get('keepLength'));
        $keepIds = [];
        for ($i = 0; $i < $tk; $i++) {
            $keepIds[] = intval($request->get('keep_'.$i));
        }

        $removeList = $this->getRepository()->getModel()
            ->where('Anx_idConta', $idConta)
            ->whereNotIn('Anx_idAnexo', $keepIds)
            ->get();

            foreach ($removeList as $item) {
            $model = $this->getRepository()->findById($item['Anx_idAnexo']);
            $path = '/public/'.$idConta.'/'.$item['Anx_formato'].'/'.$item['Anx_nome'].'.'.$item['Anx_formato'];

            if (Storage::disk('local')->exists($path)) {
                if (Storage::disk('local')->delete($path)) {
                    $model->delete();
                }
            }

        }

        $fl = intval($request->get('filesLength'));

        for ($i = 0; $i < $fl; $i++) {
            $file = $request->file('files_'.$i.'_file');
            $fullName = explode('.', $request->get('files_'.$i.'_name'));
            $name = $fullName[0];
            $ext = $fullName[1] ?? 'null';
            $path = $idConta . '/' . $ext . '/';

            $all_ext = implode(',', array_merge($this->image_ext, $this->document_ext));
            if (strpos($all_ext, $ext) === false) {
                continue;
            }

            if (Storage::putFileAs('/public/' . $path, $file, implode('.', $fullName))) {

                $this->getRepository()->create([
                    'Anx_idConta' => $idConta,
                    'Anx_endereco' => Storage::url($path . implode('.', $fullName)),
                    'Anx_nome' => $name,
                    'Anx_formato' => $ext
                ]);
            }
        }

        return json_encode(true);
    }
}
