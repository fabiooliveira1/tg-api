<?php

namespace App\Repositories;

use App\Models\Supplier;
// use Carbon\Carbon;

class SuppliersRepository extends BaseRepository
{
    public function getModel () {
        return app(Supplier::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Forn_NomeFantasia')) {
            $model = $model->where('Forn_NomeFantasia', 'like',  '%'.$request->get('Forn_NomeFantasia').'%');
        }

        if ($request->filled('Forn_CNPJ')) {
            $model = $model->where('Forn_CNPJ', 'like',  '%'.$request->get('Forn_CNPJ').'%');
        }

        if ($request->filled('Forn_idRisco')) {
            $model = $model->where('Forn_idRisco', $request->get('Forn_idRisco'));
        }

        return $model;
    }

    public function create($request)
    {
        $model = $this->getModel();
        $model = $model->create(is_array($request) ? $request : $request->all());
        $model->paymentWays()->sync($request->get('payment_ways'));
        return $model;
    }

    public function update($id, $request)
    {
        $model = $this->findById($id);
        $model->fill($request->all());
        $model->save();
        $model->paymentWays()->sync($request->get('payment_ways'));

        return $model;
    }
}