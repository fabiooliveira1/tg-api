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

        if ($request->filled('GrCt_NomeGrupo')) {
            $model = $model->where('GrCt_NomeGrupo', 'like',  '%'.$request->get('GrCt_NomeGrupo').'%');
        }

        if ($request->filled('GrCt_idRisco')) {
            $model = $model->where('GrCt_idRisco', $request->get('GrCt_idRisco'));
        }

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