<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Repositories\BillsRepository;
use App\Repositories\RenegotiationsRepository;
use App\Repositories\SimulationsRepository;
use App\Repositories\BanksRepository;
use App\Repositories\PaymentWaysRepository;
use App\Repositories\RequiredsRepository;
use App\Repositories\RisksRepository;
use App\Http\Controllers\Controller;
use App;

class InitController extends Controller
{
  public function index()
  {
    return [
      'requireds' => $this->getRequiredsRepository()->getModel()->all(),
      'risks' => $this->getRisksRepository()->getModel()->all(),
      'banks' => $this->getBanksRepository()->getModel()->all(),
      'paymentWays' => $this->getPaymentWaysRepository()->getModel()->all(),
    ];
  }

  public function dashboard()
  {
    return [
      'openBills'         => $this->getBillsRepository()->getModel()
                              ->where('Cta_Status', 'Aberta')
                              ->whereDate('Cta_dataVencimento', '>=', Carbon::now())
                              ->count(),
      'overdueBills'      => $this->getBillsRepository()->getModel()
                              ->where('Cta_Status', 'Aberta')
                              ->whereDate('Cta_dataVencimento', '<', Carbon::now())
                              ->count(),
      'renegociatedBills' => $this->getBillsRepository()->getModel()
                              ->where('Cta_Status', 'Renegociada')
                              ->count(),
      'openSimulations'   => $this->getSimulationsRepository()->getModel()
                              ->where('Sim_status', 'Pendente')
                              ->count(),
      'closeToDueDate'    => $this->getBillsRepository()->getModel()
                              ->where('Cta_Status', 'Aberta')
                              ->whereDate('Cta_dataVencimento', '>=', Carbon::now())
                              ->orderBy('Cta_dataVencimento', 'asc')
                              ->limit(5)
                              ->with(['supplier', 'billsGroup'])
                              ->get()
    ];
  }

  public function getBillsRepository()
  {
    return app(BillsRepository::class);
  }

  public function getRenegotiationsRepository()
  {
    return app(RenegotiationsRepository::class);
  }

  public function getSimulationsRepository()
  {
    return app(SimulationsRepository::class);
  }

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
}