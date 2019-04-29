<?php

namespace App\Http\Controllers\Api\BillsGroup;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\BillsGroupsRepository;

class BillsGroupsController extends BaseController
{
    public $requestName = 'BillsGroupRequest';

    public function getRepository()
    {
        return app(BillsGroupsRepository::class);
    }
}
