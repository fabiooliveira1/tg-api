<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\UsersRepository;

class UserController extends BaseController
{
    public $requestName = 'UserRequest';

    public function getRepository()
    {
        return app(UsersRepository::class);
    }

    public function index(Request $request)
    {
        $user = $this->getUser($request);
        if ($user->User_nivelAcesso === 'Analista') {
            return [ $user ];
        }

        $model = $this->getRepository()->filter($request);
    
        if ($request->filled('page')) {
            return $model->paginate($request->get('paginate') ?? 10);
        }
        return $model->get();
    }
}
