<?php

namespace App\Repositories;

class BaseRepository
{
    public function getModel () {
        return null;
    }

    public function create(array $request)
    {
        return $this->getModel()->create($data);
    }

    public function update($id, array $request)
    {
        $model = $this->getModel()::find($id);
        $model->fill($request);
        return $model->save();
    }

    public function filter($request)
    {
        return $this->getModel();
    }
}