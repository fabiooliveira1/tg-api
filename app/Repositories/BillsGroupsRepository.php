<?php

namespace App\Repositories;

use App\Models\BillsGroup;
// use Carbon\Carbon;

class BillsGroupsRepository extends BaseRepository
{
    public function getModel () {
        return app(BillsGroup::class);
    }

    // public function filter($request)
    // {
    //     $model = $this->getModel();

    //     if ($request->filled('status')) {
    //         $model->whereRng_Status($request->get('status'));
    //     }

    //     if ($request->filled('status_s')) {
    //         $model->whereIn('Rng_Status', $request->get('status_s'));
    //     }

    //     return $model;
    // }

}