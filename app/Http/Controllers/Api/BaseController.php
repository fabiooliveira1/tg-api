<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class BaseController extends Controller
{

  public $requestName;

  public function getRepository()
  {
    return null;
  }

  public function index(Request $request)
  {
    $model = $this->getRepository()->filter($request);

    if ($request->filled('page')) {
      return $model->paginate($request->get('paginate') ?? 10);
    }
    return $model->get();
  }

  public function show($id)
  {
    return $this->getRepository()->findById($id);
  }

  public function create()
  {
    $request = $this->callRequest();
    
    try {
      return json_encode($this->getRepository()->create($request));
    } catch(\Exception $e) {
      return $e->getMessage();
    }
  }

  public function update($id)
  {
    $request = $this->callRequest();

    try {
      return json_encode($this->getRepository()->update($id, $request));
    } catch(\Exception $e) {
      return $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {
      return json_encode($this->getRepository()->delete($id));
    } catch(\Exception $e) {
      return $e->getMessage();
    }
  }

  public function callRequest()
  {
    return App::make('App\\Http\\Requests\\' . $this->requestName);
  }
}