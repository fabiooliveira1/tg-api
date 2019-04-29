<?php

namespace App\Http\Controllers\Api\Requereds;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\RequeredsRepository;

class RequeresController extends BaseController
{
    public $requestName = 'RequeredsRequest';

    public function getRepository()
    {
        return app(RequeredsRepository::class);
    }
}
