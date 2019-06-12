<?php

namespace App\Http\Controllers\Api\BillsGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\BillsGroupsRepository;

class BillsGroupsController extends BaseController
{
    public $requestName = 'BillsGroupRequest';

    public function getRepository()
    {
        return app(BillsGroupsRepository::class);
    }

    public function index(Request $request)
    {
      $model = $this->getRepository()->filter($request)->with('requireds');
  
      if ($request->filled('page')) {
        return $model->paginate($request->get('paginate') ?? 10);
      }
      return $model->get();
    }

    public function show($id)
    {
      $model = $this->getRepository()->findById($id)->load('requireds');
  
      return $model;
    }
}
