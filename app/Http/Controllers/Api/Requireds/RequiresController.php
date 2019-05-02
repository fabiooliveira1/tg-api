<?php

namespace App\Http\Controllers\Api\Requireds;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\RequiredsRepository;

class RequiresController extends BaseController
{
    public $requestName = 'RequiredsRequest';

    public function getRepository()
    {
        return app(RequiredsRepository::class);
    }
}
