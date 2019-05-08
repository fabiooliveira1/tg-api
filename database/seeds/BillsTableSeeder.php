<?php

use Illuminate\Database\Seeder;
use App\Models\Bill;
use Carbon\Carbon;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(
            1,
            1,
            1,
            1,
            '111111',
            'Conta de papel',
            '2019-05-10',
            '2019-05-15',
            '2019-05-12',
            '2019-05-13',
            '123456789',
            1000,
            1000,
            5,
            10,
            5,
            2,
            'A'
        );

        $this->store(
            2,
            1,
            1,
            1,
            '222222',
            'Conta de papel 2',
            '2019-05-10',
            '2019-05-15',
            '2019-05-12',
            '2019-05-13',
            '123456789',
            1234,
            4321,
            5,
            10,
            5,
            2,
            'B'
        );

        $this->store(
            3,
            1,
            1,
            1,
            '333333',
            'Conta de papel 3',
            '2019-05-10',
            '2019-05-15',
            '2019-05-12',
            '2019-05-13',
            '123456789',
            678,
            876,
            5,
            10,
            5,
            2,
            'C'
        );
    }

    public function store(
        $id,
        $idUser,
        $idGroup,
        $idSupplier,
        $num,
        $desc,
        $dtEmissao,
        $dtVenc,
        $dtPagto,
        $dtBaixa,
        $codBarra,
        $valConta,
        $totConta,
        $tempProtesto,
        $valProtesto,
        $multa,
        $juros,
        $status
    ) {

        if (!Bill::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Bill::insert([
                'Cta_idConta'           => $id,
                'Cta_idUser'            => $idUser,
                'Cta_idGrupo'           => $idGroup,
                'Cta_idFornecedor'      => $idSupplier,
                'Cta_numConta'          => $num,
                'Cta_descrConta'        => $desc,
                'Cta_dataEmissao'       => $dtEmissao,
                'Cta_dataVencimento'    => $dtVenc,
                'Cta_dataPagto'         => $dtPagto,
                'Cta_dataBaixa'         => $dtBaixa,
                'Cta_codBarra'          => $codBarra,
                'Cta_valConta'          => $valConta,
                'Cta_totalConta'        => $totConta,
                'Cta_tempoProtesto'     => $tempProtesto,
                'Cta_valProtesto'       => $valProtesto,
                'Cta_Multa'             => $multa,
                'Cta_Juros'             => $juros,
                'Cta_Status'            => $status,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
