<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
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

  public function report(Request $request)
  {
    try {
      if (!$request->filled('type') || !$request->filled('orderBy') || !$request->filled('orderDirection') || !$request->filled('dateRange')) {
        throw new \Exception('Campos faltando!');
      }

      $dateRange = json_decode($request->get('dateRange'));

      $model = $this->getBillsRepository()->getModel()
        ->where('Cta_Status', 'Paga')
        ->whereDate('Cta_dataPagto', '>=', new Carbon($dateRange->from))
        ->whereDate('Cta_dataPagto', '<=', new Carbon($dateRange->to));

      if ($request->get('type') === 'supplier') {
        $model = $model->join('Suppliers', 'Cta_idFornecedor', 'Forn_idFornecedor')
          ->groupBy('Forn_idFornecedor', 'Forn_NomeFantasia', 'Forn_idRisco')
          ->select([
            \DB::raw('Forn_idFornecedor as id'),
            \DB::raw('Forn_NomeFantasia as name'),
            \DB::raw('Forn_idRisco as risk'),
            \DB::raw('count(Cta_idFornecedor) as count'),
            \DB::raw('sum(Cta_totalConta) as amount')
          ]);
      }
      if ($request->get('type') === 'bills_group') {
        $model = $model->join('Bills_group', 'Cta_idGrupo', 'GrCt_idGrupo')
          ->groupBy('GrCt_idGrupo', 'GrCt_NomeGrupo', 'GrCt_idRisco')
          ->select([
            \DB::raw('GrCt_idGrupo as id'),
            \DB::raw('GrCt_NomeGrupo as name'),
            \DB::raw('GrCt_idRisco as risk'),
            \DB::raw('count(Cta_idGrupo) as count'),
            \DB::raw('sum(Cta_totalConta) as amount')
          ]);
      }

      $field = $request->get('orderBy');
      $order = $request->get('orderDirection');

      return $model->orderBy($field, $order)->get();
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
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