<?php

namespace App\Http\Controllers\Api\Bank;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\BanksRepository;

class BanksController extends BaseController
{
    public $requestName = 'BankRequest';

    public function getRepository()
    {
        return app(BanksRepository::class);
    }
}
