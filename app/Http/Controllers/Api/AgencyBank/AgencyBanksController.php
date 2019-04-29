<?php

namespace App\Http\Controllers\Api\AgencyBank;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\AgencyBanksRepository;

class AgencyBanksController extends BaseController
{
    public $requestName = 'AgencyBankRequest';

    public function getRepository()
    {
        return app(AgencyBanksRepository::class);
    }
}
