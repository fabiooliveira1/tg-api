<?php

namespace App\Http\Controllers\Api\Simulation;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\SimulationsRepository;
use App\Repositories\AccountBanksRepository;
use App\Repositories\BillsRepository;

class SimulationController extends BaseController
{
    public $requestName = 'SimulationRequest';

    public function getRepository()
    {
      return app(SimulationsRepository::class);
    }

    public function getAccountBanksRepository()
    {
      return app(AccountBanksRepository::class);
    }

    public function getBillsRepository()
    {
        return app(BillsRepository::class);
    }

    public function index(Request $request)
    {
      $model = $this->getRepository()->filter($request)
        ->with('bankAccount');
  
      if ($request->filled('page')) {
        return $model->paginate($request->get('paginate') ?? 10);
      }
      return $model->get();
    }

    public function show($id)
    {
      $model = $this->getRepository()->findById($id)
        ->load([
          'bills' => function ($q) {
            $q = $q->with(['supplier', 'billsGroup']);
            return $q;
          },
          'bankAccount' => function ($q) {
            $q = $q->with('agencyBank.bank');
            return $q->get();
          }
        ]);
  
      return $model;
    }

    public function end ($id)
    {
      $request = $this->callRequest();
  
      try {
        $this->getRepository()->update($id, $request);
        $model = $this->getRepository()->findById($id);
        if ($model->Sim_status == 'Aprovada') {
          $simDate = new Carbon($model->Sim_dataPagtoSimulacao);

          foreach($model->bills as $bill) {
            $dueDate = new Carbon($bill['Cta_dataVencimento']);
            $diff = $simDate->diffInDays($dueDate, false) * -1;
            $simValue = $bill['Cta_valConta'];

            if ($diff > 0) {
              if ($bill['Cta_Multa']) {
                $simValue += $bill['Cta_valConta'] * ($bill['Cta_Multa'] > 1 ? $bill['Cta_Multa'] / 100 : $bill['Cta_Multa']);
              }

              if ($bill['Cta_Juros']) {
                $simValue = $simValue*pow((1 + ($bill['Cta_Juros'] > 1 ? $bill['Cta_Juros'] / 100 : $bill['Cta_Juros'])), $diff);
              }

              if ($bill['Cta_tempoProtesto'] && $bill['Cta_tempoProtesto'] > $diff) {
                $simValue += $bill['Cta_valProtesto'];
              }
            }

            $billModel = $this->getBillsRepository()->findById($bill['Cta_idConta']);

            $billModel->fill([
              'Cta_totalConta' => round($simValue, 2),
              'Cta_dataPagto' => $simDate,
              'Cta_Status' => 'Paga'
            ]);

            $billModel->save();
          }

          $bankAccountModel = $this->getAccountBanksRepository()->findById($model->Sim_idContaBancaria);

          $bankAccountModel->fill([
            'CtBc_Saldo' => $bankAccountModel->CtBc_Saldo - $model->Sim_valSimulacao
          ]);

          $bankAccountModel->save();
        }
        return json_encode(true);
      } catch (\Exception $e) {
        return response($e->getMessage(), 422);
      }
    }
}
