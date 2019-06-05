<?php

namespace App\Repositories;

use App\Models\Simulation;
// use Carbon\Carbon;

class SimulationsRepository extends BaseRepository
{
    public function getModel () {
        return app(Simulation::class);
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
    
    public function sync($model, $requireds)
    {
        // $required = [1, 2, 3, 4 ,5]
        $model->requireds->sync($requireds);

        return $model->with('requireds');
    }

}