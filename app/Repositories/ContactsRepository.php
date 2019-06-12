<?php

namespace App\Repositories;

use App\Models\Contact;
// use Carbon\Carbon;

class ContactsRepository extends BaseRepository
{
    public function getModel()
    {
        return app(Contact::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Cnt_idFornecedor')) {
            $model = $model->where('Cnt_idFornecedor', $request->get('Cnt_idFornecedor'));
        }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('Rng_Status', $request->get('status_s'));
        // }

        return $model;
    }
}
