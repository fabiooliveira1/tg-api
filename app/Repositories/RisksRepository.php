<?php

namespace App\Repositories;

use App\Models\Risk;
// use Carbon\Carbon;

class RisksRepository extends BaseRepository
{
    public function getModel () {
        return app(Risk::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        // if ($request->filled('status')) {
        //     $model->whereSim_status($request->get('status'));
        // }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('Sim_status', $request->get('status_s'));
        // }

        return $model;
    }

}