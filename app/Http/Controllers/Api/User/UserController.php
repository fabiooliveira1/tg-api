<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\UsersRepository;

class UserController extends BaseController
{
    public $requestName = 'UserRequest';

    public function getRepository()
    {
        return app(UsersRepository::class);
    }
}
