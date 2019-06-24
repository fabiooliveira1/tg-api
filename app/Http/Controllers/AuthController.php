<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UsersRepository;

class AuthController extends Controller
{
  public function getRepository()
  {
      return app(UsersRepository::class);
  }

  public function login(Request $request)
  {
    try {
      if (!$request->filled('email')) {
        throw new \Exception('Campo de email faltando');
      }
      if (!$request->filled('password')) {
        throw new \Exception('Campo de senha faltando');
      }

      $model = $this->getRepository()->getModel()
        ->where('User_email', $request->get('email'))
        ->first();

      if (!$model || !Hash::check($request->get('password'), $model->User_senha)) {
        throw new \Exception('Email e/ou senha incorretos');
      }

      return [
        'email' => $model->User_email,
        'name' => $model->User_nome,
        'token' => Crypt::encryptString($model->User_email . 'M2Print' . $model->User_matricula)
      ];
    } catch (\Exception $e) {
      return response($e->getMessage(), 401);
    }
  }

  public function show($id)
  {
    return $this->getRepository()->findById($id);
  }

  public function create()
  {
    $request = $this->callRequest();

    try {
      return json_encode($this->getRepository()->create($request));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }

  public function update($id)
  {
    $request = $this->callRequest();

    try {
      return json_encode($this->getRepository()->update($id, $request));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }

  public function delete($id)
  {
    try {
      return json_encode($this->getRepository()->delete($id));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }

  public function callRequest()
  {
    return App::make('App\\Http\\Requests\\' . $this->requestName);
  }
}
