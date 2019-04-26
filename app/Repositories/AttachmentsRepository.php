<?php

namespace App\Repositories;

use App\Models\Attachment;
// use Carbon\Carbon;

class AttachmentsRepository extends BaseRepository
{
    public function getModel () {
        return app(Attachment::class);
    }

    // public function filter($request)
    // {
    //     $model = $this->getModel();

    //     if ($request->filled('status')) {
    //         $model->whereRng_Status($request->get('status'));
    //     }

    //     if ($request->filled('status_s')) {
    //         $model->whereIn('Rng_Status', $request->get('status_s'));
    //     }

    //     return $model;
    // }

}