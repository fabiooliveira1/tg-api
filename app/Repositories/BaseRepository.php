<?php

namespace App\Repositories;

use App\Models\Bill;
use App\Http\Requests\BillRequest;

class BaseRepository
{
    public function getModel()
    {
        return null;
    }

    public function filter($request)
    {
        return $this->getModel()::find($request);
    }

    public function create($request)
    {
        $model = $this->getModel();
        $model->fill($request->all());
        return $model->save();
    }

    public function update($id)
    {
        $model = $this->getModel()::find($id);
        // $model->fill($request->all());
        return $model;
        // return $model;
    }

    public function delete($id)
    {
        $model = $this->getModel()::find($id);
        return $model->delete();
    }
}
