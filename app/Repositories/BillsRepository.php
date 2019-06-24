<?php

namespace App\Repositories;

use App\Models\Bill;
use Carbon\Carbon;

class BillsRepository extends BaseRepository
{
    public function getModel()
    {
        return app(Bill::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Cta_descrConta')) {
            $model = $model->where('Cta_descrConta', 'like',  '%'.$request->get('Cta_descrConta').'%');
        }

        if ($request->filled('Cta_Status_s')) {
            $model = $model->whereIn('Cta_Status', $request->get('Cta_Status_s'));
        }

        if ($request->filled('Cta_Status')) {
            $model = $model->where('Cta_Status', $request->get('Cta_Status'));
        }

        if ($request->filled('Cta_idFornecedor')) {
            $model = $model->where('Cta_idFornecedor', $request->get('Cta_idFornecedor'));
        }

        if ($request->filled('Cta_idGrupo')) {
            $model = $model->where('Cta_idGrupo', $request->get('Cta_idGrupo'));
        }

        if ($request->filled('Cta_dataVencimento')) {
            $dueDate = json_decode($request->get('Cta_dataVencimento'));
            if($dueDate->from) {
                $model = $model->whereDate('Cta_dataVencimento', '>=', new Carbon($dueDate->from));
            }
            if($dueDate->to) {
                $model = $model->whereDate('Cta_dataVencimento', '<=', new Carbon($dueDate->to));
            }
        }

        return $model;
    }
}
