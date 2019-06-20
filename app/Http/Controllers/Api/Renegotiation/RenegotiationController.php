<?php

namespace App\Http\Controllers\Api\Renegotiation;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\RenegotiationsRepository;
use App\Repositories\BillsRepository;

class RenegotiationController extends BaseController
{
    public $requestName = 'RenegotiationRequest';

    public function getRepository()
    {
        return app(RenegotiationsRepository::class);
    }

    public function getBillsRepository()
    {
        return app(BillsRepository::class);
    }

    public function index(Request $request)
    {
      $model = $this->getRepository()->filter($request)
        ->with(['bill', 'contact', 'contact.supplier']);
  
      if ($request->filled('page')) {
        return $model->paginate($request->get('paginate') ?? 10);
      }
      return $model->get();
    }

    public function show($id)
    {
      $model = $this->getRepository()->findById($id)
        ->load(['bill', 'contact', 'contact.supplier']);
  
      return $model;
    }

    public function end ($id)
    {
      $request = $this->callRequest();
  
      try {
        $this->getRepository()->update($id, $request);
        $model = $this->getRepository()->findById($id);
        if ($model->Rng_Status == 'Aprovada') {
            $bill = $this->getBillsRepository()->findById($model->Rng_idConta);
            $bill = $bill->fill([
                'Cta_Status' => 'Renegociada',
                'Cta_valConta' => $model->Rng_valProposta,
                'Cta_dataVencimento' => $model->Rng_vencProposta,
            ]);
            $bill->save();
        }
        return json_encode(true);
      } catch (\Exception $e) {
        return response($e->getMessage(), 422);
      }
    }
}
