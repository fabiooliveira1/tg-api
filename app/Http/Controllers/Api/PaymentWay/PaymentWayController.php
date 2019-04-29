<?php

namespace App\Http\Controllers\Api\PaymentWay;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\PaymentWaysRepository;

class PaymentWayController extends BaseController
{
    public $requestName = 'PaymentWayRequest';

    public function getRepository()
    {
        return app(PaymentWaysRepository::class);
    }
}
