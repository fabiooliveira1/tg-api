<?php

namespace App\Http\Controllers\Api\Bill;

use App\Http\Controllers\Controller;
use App\Repositories\BillsRepository;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Requests\BillRequest;
// use \DB; EXEMPLO DE TRANSACTION

class BillsController extends Controller
{
    private function getBillsRepository()
    {
        return app(BillsRepository::class);
    }

    /**
     * Create a new controller instance.
     * @param request Request
     * @return paginate object || array
     */
    public function index(Request $request)
    {
        $model = $this->getBillsRepository()->filter($request);

        logger($model->toSql());
        logger($model->getBindings());
        if ($request->filled('page')) {
            return $model->paginate($request->get('paginate') ?? 10);
        }

        return $model->get();
    }
    // ========================================================
    // EXEMPLO DE TRANSACTION
    // public function index(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $model = $this->getBillsRepository()->filter($request);

    //         logger($model->toSql());
    //         logger($model->getBindings());
    //         if ($request->filled('page')) {
    //             return $model->paginate($request->get('paginate') ?? 10);
    //         }

    //         DB::commit();
    //         return $model->get();
    //     } catch(\Exception $e) {
    //         DB::rolback();
    //         logger($e->getMessage());
    //         return response('Não OK', 422);
    //     }
    // }

    /**
     * Create a new controller instance.
     * @param bill Bill
     * @return bill object || null
     */
    public function show(Bill $bill = null)
    {
        return $bill;
    }

    /**
     * Create a new controller instance.
     * @param request BillRequest
     * @return Boolean || Array
     */

    public function create(BillRequest $request)
    {
        return json_encode($this->getBillsRepository()->create($request));
    }

    /**
     * Create a new controller instance.
     * @param request BillRequest
     * @return Boolean || Array
     */
    public function update($request)
    {
        return json_encode($this->getBillsRepository()->update($request));
    }

    public function delete($request)
    {
        return json_encode($this->getBillsRepository()->delete($request));
    }
}
