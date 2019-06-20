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
            4,
            11,
            '53747201906',
            'SAAEMAI2019',
            '2019-05-15',
            '2019-06-17',
            null,
            null,
            '826200000048306600910013000053747002715061014158',
            430.45,
            null,
            null,
            null,
            null,
            null,
            'Aberta'
        );

        $this->store(
            2,
            1,
            4,
            12,
            '146099032019',
            'IPTU2019',
            '2019-02-18',
            '2019-03-15',
            '2019-03-15',
            '2019-03-18',
            '816300000014801744042012903210104001219851190005',
            1000.34,
            1000.34,
            null,
            null,
            5,
            2,
            'Paga'
        );

        $this->store(
            3,
            1,
            1,
            2,
            '8190790309885',
            'Papel Papel couché',
            '2019-05-16',
            '2019-06-17',
            null,
            null,
            '033994928136981907904309886010244000000000000000',
            40500.50,
            null,
            null,
            null,
            null,
            null,
            'Aberta'
        );

        $this->store(
            4,
            1,
            1,
            3,
            '1585959419',
            'Chapa de impressão offset',
            '2019-05-31',
            '2019-06-30',
            null,
            null,
            '341761500990015849590410002114032000000000000000',
            60000.90,
            null,
            null,
            null,
            null,
            null,
            'Aberta'
        );

        $this->store(
            5,
            1,
            1,
            4,
            '2385459679',
            'Tintas: Royal - Cromos',
            '2019-05-31',
            '2019-06-30',
            null,
            null,
            '0014532080990215345960410072124032100000000000000',
            15000,
            null,
            null,
            null,
            null,
            null,
            'Aberta'
        );

        $this->store(
            6,
            1,
            3,
            6,
            '1585959419',
            'Periféricos: mouses, teclados e monitores',
            '2019-05-31',
            '2019-06-30',
            null,
            null,
            '0012732800992015349560417002124032100000000000000',
            25000.50,
            null,
            null,
            null,
            null,
            null,
            'Aberta'
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
