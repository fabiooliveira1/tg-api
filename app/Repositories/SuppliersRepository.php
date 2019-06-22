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

        // if ($request->filled('status')) {
        //     $model->whereCtaStatus($request->get('status'));
        // }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('cta_status', $request->get('status_s'));
        // }

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