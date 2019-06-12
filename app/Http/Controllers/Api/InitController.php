<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RequiredsRepository;
use App\Repositories\RisksRepository;
use App\Http\Controllers\Controller;
use App;

class InitController extends Controller
{

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
    logger('oi');
    return [
      'requireds' => $this->getRequiredsRepository()->getModel()->all(),
      'risks' => $this->getRisksRepository()->getModel()->all(),
    ];
  }
}