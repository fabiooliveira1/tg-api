<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use Carbon\Carbon;

class SuppliersTableSeeder extends Seeder
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
            '10.332.802/0001-52',
            'M2 Print Fornecedor',
            'M2 Print',
            '487.436.245.783',
            'Rua Leonardo Braz de Paula Lerco',
            'Jardim Residencial Morada das Flores',
            'Sorocaba',
            'SP',
            '18087-758',
            'Banco do Brasil',
            '0995',
            '12345-6'
        );

        $this->store(
            2,
            2,
            '22.222.222/0001-22',
            'M2 Print Fornecedor 2',
            'M2 Print 2',
            '487.436.245.783',
            'Rua Leonardo ',
            'Jardim Residencial ',
            'Sorocaba 2',
            'SP',
            '18087-758',
            'Banco do Brasil',
            '1111',
            '45678-6'
        );

        $this->store(
            3,
            3,
            '33.333.333/0001-33',
            'M2 Print Fornecedor 3',
            'M2 Print 3',
            '487.436.245.783',
            'Braz de Paula Lerco',
            'Morada das Flores',
            'Sorocaba 3',
            'SP',
            '18087-758',
            'Banco do Brasil',
            '3333',
            '96325-6'
        );
    }

    public function store(
        $id,
        $idRisk,
        $cnpj,
        $razaoSoc,
        $nomeFant,
        $inscEstad,
        $end,
        $bairro,
        $cidade,
        $uf,
        $cep,
        $banco,
        $agencia,
        $cc
    ) {

        if (!Supplier::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Supplier::insert([
                'Forn_idFornecedor'     => $id,
                'Forn_idRisco'          => $idRisk,
                'Forn_CNPJ'             => $cnpj,
                'Forn_RazaoSocial'      => $razaoSoc,
                'Forn_NomeFantasia'     => $nomeFant,
                'Forn_InscrEstadual'    => $inscEstad,
                'Forn_Endereco'         => $end,
                'Forn_Bairro'           => $bairro,
                'Forn_Cidade'           => $cidade,
                'Forn_UF'               => $uf,
                'Forn_CEP'              => $cep,
                'Forn_Banco'            => $banco,
                'Forn_Agencia'          => $agencia,
                'Forn_ContaBancaria'    => $cc,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
