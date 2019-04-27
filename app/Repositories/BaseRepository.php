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

    public function create($request)
    {
        $model = $this->getModel();
        $model->fill($request->all());
        return $model->save();
    }

    public function update($request)
    {
        $model = Bill::findOrFail($request);
        $model->fill($request->all());
        return $model->save();
    }

    public function delete($request)
    {
        $model = Bill::findOrFail($request);
        return $model->delete();
    }

    // public function filter($request)
    // {
    //     return $this->getModel();
    // }
}
