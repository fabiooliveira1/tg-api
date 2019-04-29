<?php

namespace App\Http\Controllers\Api\Simulation;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\SimulationsRepository;

class SimulationController extends BaseController
{
    public $requestName = 'SimulationRequest';

    public function getRepository()
    {
        return app(SimulationsRepository::class);
    }
}
