<?php

namespace App\Http\Controllers\Api\Supplier;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\SuppliersRepository;

class SupplierController extends BaseController
{
    public $requestName = 'SupplierRequest';

    public function getRepository()
    {
        return app(SuppliersRepository::class);
    }
}
