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

    public function show($id)
    {
      return $this->getRepository()->findById($id)->load('attachments');
    }

    public function create()
    {
      $request = $this->callRequest();
  
      try {
        $user = $this->getUser($request)->User_idUsuario;
        $request->merge(['Cta_idUser' => $user]);

        return json_encode($this->getRepository()->create($request));
      } catch (\Exception $e) {
        return response($e->getMessage(), 422);
      }
    }
}
