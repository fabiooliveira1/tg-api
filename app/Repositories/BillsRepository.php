<?php

namespace App\Repositories;

use App\Models\Bill;

class BillsRepository extends BaseRepository
{
    public function getModel()
    {
        return app(Bill::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Cta_idFornecedor')) {
            $model = $model->where('Cta_idFornecedor', $request->get('Cta_idFornecedor'));
        }

        if ($request->filled('Cta_Status')) {
            $model = $model->where('Cta_Status', $request->get('Cta_Status'));
        }
        
        // if ($request->filled('status_s')) {
        //     $model->whereIn('cta_status', $request->get('status_s'));
        // }

        return $model;
    }
}
