<?php

namespace App\Http\Controllers\Api\Renegotiation;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\RenegotiationsRepository;

class RenegotiationController extends BaseController
{
    public $requestName = 'RenegotiationRequest';

    public function getRepository()
    {
        return app(RenegotiationsRepository::class);
    }
}
