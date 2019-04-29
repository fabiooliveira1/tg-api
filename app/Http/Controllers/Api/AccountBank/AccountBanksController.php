<?php

namespace App\Http\Controllers\Api\AccountBank;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\AccountBanksRepository;

class AccountBanksController extends BaseController
{
  public $requestName = 'AccountBanksRequest';

  public function getRepository()
  {
    return app(AccountBanksRepository::class);
  }
}
