<?php

namespace App\Repositories;

use App\Models\Bill;

class BaseRepository
{
    public function getModel()
    {
        return null;
    }

    public function create($request)
    {
        $model = $this->getModel();
        $model->fill($request->all());
        return $model->save();
    }

    public function update($request)
    {
        $model = $this->getModel()::find($request);
        $model-> fill($request->all());
        return $model->save();
    }

    public function delete($request)
    {
        $model = $this->getModel()::findOrFail($request);
        return $model->delete();
    }

    // public function filter($request)
    // {
    //     return $this->getModel();
    // }
}
