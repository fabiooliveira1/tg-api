<?php

namespace App\Repositories;

use App\Models\BillsGroup;
use Carbon\Carbon;

class BillsGroupsRepository extends BaseRepository
{
    public function getModel () {
        return app(BillsGroup::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        // if ($request->filled('Cta_descrConta')) {
        //     $model = $model->where('Cta_descrConta', 'like',  '%'.$request->get('Cta_descrConta').'%');
        // }

        // if ($request->filled('Cta_Status')) {
        //     $model = $model->where('Cta_Status', $request->get('Cta_Status'));
        // }

        // if ($request->filled('Cta_idFornecedor')) {
        //     $model = $model->where('Cta_idFornecedor', $request->get('Cta_idFornecedor'));
        // }

        // if ($request->filled('Cta_idGrupo')) {
        //     $model = $model->where('Cta_idGrupo', $request->get('Cta_idGrupo'));
        // }

        // if ($request->filled('Cta_dataVencimento')) {
        //     if(isset($dueDate->from)) {
        //         $model = $model->whereDate('Cta_dataVencimento', '>=', new Carbon($dueDate->from));
        //     }
        //     if(isset($dueDate->to)) {
        //         $model = $model->whereDate('Cta_dataVencimento', '<=', new Carbon($dueDate->to));
        //     }
        // }

        // logger($model-toSql());


        return $model;
    }

    public function create($request)
    {
        $model = $this->getModel();
        $model->fill($request->all());
        $model->save();
        $model->requireds()->sync($request->get('requireds'));

        return $model;
    }

    public function update($id, $request)
    {
        $model = $this->findById($id);
        $model->fill($request->all());
        $model->save();
        $model->requireds()->sync($request->get('requireds'));

        return $model;
    }
}