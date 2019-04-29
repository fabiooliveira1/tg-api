<?php

namespace App\Http\Controllers\Api\Risk;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\RisksRepository;

class RiskController extends BaseController
{
    public $requestName = 'RiskRequest';

    public function getRepository()
    {
        return app(RisksRepository::class);
    }
}
