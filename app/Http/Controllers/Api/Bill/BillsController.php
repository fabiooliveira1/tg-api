<?php

namespace App\Http\Controllers\Api\Bill;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\BillsRepository;

class BillsController extends BaseController
{
    public $requestName = 'BillRequest';

    public function getRepository()
    {
        return app(BillsRepository::class);
    }

    public function index(Request $request)
    {
      $model = $this->getRepository()->filter($request)
        ->with(['supplier', 'billsGroup', 'user']);
  
      if ($request->filled('page')) {
        return $model->paginate($request->get('paginate') ?? 10);
      }
      return $model->get();
    }
}
