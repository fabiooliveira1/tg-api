<?php

namespace App\Repositories;

use App\Models\Simulation;
use Carbon\Carbon;

class SimulationsRepository extends BaseRepository
{
    public function getModel () {
        return app(Simulation::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Sim_status')) {
            $model = $model->where('Sim_status', $request->get('Sim_status'));
        }

        if ($request->filled('created_at')) {
            $date = json_decode($request->get('created_at'));
            if($date->from) {
                $model = $model->whereDate('created_at', '>=', new Carbon($date->from));
            }
            if($date->to) {
                $model = $model->whereDate('created_at', '<=', new Carbon($date->to));
            }
        }

        return $model;
    }

    public function create($request)
    {
        $model = $this->getModel();
        $model->fill($request->all());
        $model->save();
        $model->bills()->sync($request->get('bills'));

        return $model;
    }

}