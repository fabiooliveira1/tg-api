<?php

namespace App\Http\Controllers\Api\AccountBank;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\AccountBanksRepository;

class AccountBanksController extends BaseController
{
  public $requestName = 'AccountBankRequest';

  public function getRepository()
  {
    return app(AccountBanksRepository::class);
  }

  public function index(Request $request)
  {
    $model = $this->getRepository()->filter($request)->with('agencyBank');

    if ($request->filled('page')) {
      return $model->paginate($request->get('paginate') ?? 10);
    }
    return $model->get();
  }

  public function show($id)
  {
    $model = $this->getRepository()->findById($id)->load('agencyBank');

    return $model;
  }

  public function amount($id, Request $request)
  {

    try {
      if (!$request->filled('CtBc_Saldo')) {
        throw new \Exception('Missing fields', 422);
      }
      return json_encode($this->getRepository()->update($id, $request));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }
}
