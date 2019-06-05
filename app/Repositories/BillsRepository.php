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

        // if ($request->filled('status')) {
        //     $model->whereCtaStatus($request->get('status'));
        // }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('cta_status', $request->get('status_s'));
        // }

        return $model;
    }

    public function sync($model, $requireds)
    {
        // $required = [1, 2, 3, 4 ,5]
        $model->requireds->sync($requireds);

        return $model->with('requireds');
    }
}
