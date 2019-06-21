<?php

namespace App\Repositories;

use App\Models\Attachment;
// use Carbon\Carbon;

class AttachmentsRepository extends BaseRepository
{
    public function getModel () {
        return app(Attachment::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Anx_idConta')) {
            $model = $model->where('Anx_idConta', $request->get('Anx_idConta'));
        }

        return $model;
    }

}