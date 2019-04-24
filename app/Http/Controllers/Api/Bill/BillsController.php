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

    public function create()
    {
        // $this->validate($request, [
        //     'Cta_idUser' => 'required|max:11',
        //     'Cta_idGrupo' => 'required|max:11',
        //     'Cta_idFornecedor' => 'required|max:11'
        //     ]);

        // BillRequest $request

        // $post = new Post();
        // $post->Cta_idConta          = $request->input['Cta_idConta'];
        // $post->Cta_idUser           = $request->input['Cta_idUser'];
        // $post->Cta_idGrupo          = $request->input['Cta_idGrupo'];
        // $post->Cta_idFornecedor     = $request->input['Cta_idFornecedor'];
        // $post->Cta_descrConta       = $request->input['Cta_descrConta'];
        // $post->Cta_dataEmissao      = $request->input['Cta_dataEmissao'];
        // $post->Cta_dataVencimento   = $request->input['Cta_dataVencimento'];
        // $post->Cta_dataPagto        = $request->input['Cta_dataPagto'];
        // $post->Cta_dataBaixa        = $request->input['Cta_dataBaixa'];
        // $post->Cta_codBarra         = $request->input['Cta_codBarra'];
        // $post->Cta_valConta         = $request->input['Cta_valConta'];
        // $post->Cta_totalConta       = $request->input['Cta_totalConta'];
        // $post->Cta_tempoProtesto    = $request->input['Cta_tempoProtesto'];
        // $post->Cta_valProtesto      = $request->input['Cta_valProtesto'];
        // $post->Cta_Multa            = $request->input['Cta_Multa'];
        // $post->Cta_Juros            = $request->input['Cta_Juros'];
        // $post->Cta_Status           = $request->input['Cta_Status'];
        // $post->Cta_idPedidoCompra   = $request->input['Cta_idPedidoCompra'];
        // $post->save();

        // Post::create(request([
        //     'Cta_idConta' => request('Cta_idConta'),
        //     'Cta_idUser' => request('Cta_idUser'),
        //     'Cta_idGrupo' => request('Cta_idGrupo'),
        //     'Cta_idFornecedor' => request('Cta_idFornecedor'),
        //     'Cta_descrConta' => request('Cta_descrConta'),
        //     'Cta_dataEmissao' => request('Cta_dataEmissao'),
        //     'Cta_dataVencimento' => request('Cta_dataVencimento'),
        //     'Cta_dataPagto' => request('Cta_dataPagto'),
        //     'Cta_dataBaixa' => request('Cta_dataBaixa'),
        //     'Cta_codBarra' => request('Cta_codBarra'),
        //     'Cta_valConta' => request('Cta_valConta'),
        //     'Cta_totalConta' => request('Cta_totalConta'),
        //     'Cta_tempoProtesto' => request('Cta_tempoProtesto'),
        //     'Cta_valProtesto' => request('Cta_valProtesto'),
        //     'Cta_Multa' => request('Cta_Multa'),
        //     'Cta_Juros' => request('Cta_Juros'),
        //     'Cta_Status' => request('Cta_Status'),
        //     'Cta_idPedidoCompra' => request('Cta_idPedidoCompra')
        // ]));

        // return Bill::create($request->all());

        $post = [
            'Cta_idConta' => request('Cta_idConta'),
            'Cta_idUser' => request('Cta_idUser'),
            'Cta_idGrupo' => request('Cta_idGrupo'),
            'Cta_idFornecedor' => request('Cta_idFornecedor'),
            'Cta_descrConta' => request('Cta_descrConta'),
            'Cta_dataEmissao' => request('Cta_dataEmissao'),
            'Cta_dataVencimento' => request('Cta_dataVencimento'),
            'Cta_dataPagto' => request('Cta_dataPagto'),
            'Cta_dataBaixa' => request('Cta_dataBaixa'),
            'Cta_codBarra' => request('Cta_codBarra'),
            'Cta_valConta' => request('Cta_valConta'),
            'Cta_totalConta' => request('Cta_totalConta'),
            'Cta_tempoProtesto' => request('Cta_tempoProtesto'),
            'Cta_valProtesto' => request('Cta_valProtesto'),
            'Cta_Multa' => request('Cta_Multa'),
            'Cta_Juros' => request('Cta_Juros'),
            'Cta_Status' => request('Cta_Status'),
            'Cta_idPedidoCompra' => request('Cta_idPedidoCompra')
        ];

        Bill::create($post);
        return redirect('/');
    }

    /**
     * Create a new controller instance.
     * @param request BillRequest
     * @return Boolean || Array
     */
    public function update(Bill $bill, Billrequest $request)
    {
        $bill->Cta_idUser = $request->Cta_idUser;
        $bill->Cta_idGrupo = $request->Cta_idGrupo;
        $bill->Cta_idFornecedor = $request->Cta_idFornecedor;
        $bill->Cta_descrConta = $request->Cta_descrConta;
        $bill->Cta_dataEmissao = $request->Cta_dataEmissao;
        $bill->Cta_dataVencimento = $request->Cta_dataVencimento;
        $bill->Cta_dataPagto = $request->Cta_dataPagto;
        $bill->Cta_dataBaixa = $request->Cta_dataBaixa;
        $bill->Cta_codBarra = $request->Cta_codBarra;
        $bill->Cta_valConta = $request->Cta_valConta;
        $bill->Cta_totalConta = $request->Cta_totalConta;
        $bill->Cta_tempoProtesto = $request->Cta_tempoProtesto;
        $bill->Cta_valProtesto = $request->Cta_valProtesto;
        $bill->Cta_Multa = $request->Cta_Multa;
        $bill->Cta_Juros = $request->Cta_Juros;
        $bill->Cta_Status = $request->Cta_Status;
        $bill->Cta_idPedidoCompra = $request->Cta_idPedidoCompra;

        $bill->update();
    }

    public function delete(bill $bill)
    {
        $bill->delete();
    }
}
