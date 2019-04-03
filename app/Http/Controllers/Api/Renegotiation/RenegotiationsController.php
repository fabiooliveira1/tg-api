<?php

namespace App\Http\Controllers\Api\Renegotiation;

use App\Http\Controllers\Controller;
use App\Repositories\RenegotiationsRepository;
use App\Models\Renegotiation;
use Illuminate\Foundation\Http\Request;
// use \DB; EXEMPLO DE TRANSACTION

class RenegotiationsController extends Controller
{
    private function getRenegotiationsRepository()
    {
        return app(RenegotiationsRepository::class);
    }

    /**
     * Create a new controller instance.
     * @param request Request
     * @return paginate object || array
     */
    public function index(Request $request)
    {
            $model = $this->getRenegotiationsRepository()->filter($request);

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
     * @param renegotiation Bill
     * @return renegotiation object || null
     */
    public function show(Renegotiation $renegotiation = null)
    {
        return $renegotiation;
    }

    /**
     * Create a new controller instance.
     * @param request RenegotiatonRequest
     * @return Boolean || Array
     */
    public function create(RenegotiationRequest $request)
    {
        $renegotiation = $this->getRenegotiationsRepository()->create($request);

        return $renegotiation;
        /**
         * [ errors: ['value' => 'O campo value é obrigatório e deve ser um número']]
         */
    }

    /**
     * Create a new controller instance.
     * @param request RenegotiationRequest
     * @return Boolean || Array
     */
    public function update(Renegotiation $renegotiation, RenegotiationRequest $request)
    {
        $renegotiation = $this->getRenegotiationsRepository()->update($renegotiation, $request);

        return $renegotiation;
        /**
         * [ errors: ['value' => 'O campo value é obrigatório e deve ser um número']]
         */
    }
}
