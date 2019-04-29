<?php

namespace App\Http\Controllers\Api\Bill;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\BillsRepository;
use function Psy\debug;

class BillsController extends BaseController
{
    public $requestName = 'BillRequest';

    public function getRepository()
    {
        return app(BillsRepository::class);
    }
}
