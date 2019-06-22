<?php

namespace App\Http\Controllers\Api;

use App\Repositories\BanksRepository;
use App\Repositories\PaymentWaysRepository;
use App\Repositories\RequiredsRepository;
use App\Repositories\RisksRepository;
use App\Http\Controllers\Controller;
use App;

class InitController extends Controller
{
  public function getBanksRepository()
  {
    return app(BanksRepository::class);
  }

  public function getPaymentWaysRepository()
  {
    return app(PaymentWaysRepository::class);
  }

  public function getRequiredsRepository()
  {
    return app(RequiredsRepository::class);
  }

  public function getRisksRepository()
  {
    return app(RisksRepository::class);
  }

  public function index()
  {
    return [
      'requireds' => $this->getRequiredsRepository()->getModel()->all(),
      'risks' => $this->getRisksRepository()->getModel()->all(),
      'banks' => $this->getBanksRepository()->getModel()->all(),
      'paymentWays' => $this->getPaymentWaysRepository()->getModel()->all(),
    ];
  }
}