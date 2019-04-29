<?php

namespace App\Repositories;

use App\Models\Renegotiation;
// use Carbon\Carbon;

class RenegotiationsRepository extends BaseRepository
{
    public function getModel () {
        return app(Renegotiation::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        // if ($request->filled('status')) {
        //     $model->whereRng_Status($request->get('status'));
        // }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('Rng_Status', $request->get('status_s'));
        // }

        return $model;
    }

}