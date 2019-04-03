<?php

namespace App\Http\Controllers\Api\Bill;

use App\Http\Controllers\Controller;
use App\Repositories\BillsRepository;
use App\Models\Bill;
use Illuminate\Foundation\Http\Request;
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
        DB::beginTransaction();
        try {
            $model = $this->getBillsRepository()->filter($request);

            logger($model->toSql());
            logger($model->getBindings());
            if ($request->filled('page')) {
                return $model->paginate($request->get('paginate') ?? 10);
            }

            DB::commit();
            return $model->get();
        } catch(\Exception $e) {
            DB::rolback();
            logger($e->getMessage());
            return response('Não OK', 422);
        }
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
        $bill = $this->getBillsRepository()->create($request);

        return $bill;
        /**
         * [ errors: ['value' => 'O campo value é obrigatório e deve ser um número']]
         */
    }

    /**
     * Create a new controller instance.
     * @param request BillRequest
     * @return Boolean || Array
     */
    public function update(Bill $bill, BillRequest $request)
    {
        $bill = $this->getBillsRepository()->update($bill, $request);

        return $bill;
        /**
         * [ errors: ['value' => 'O campo value é obrigatório e deve ser um número']]
         */
    }
}
