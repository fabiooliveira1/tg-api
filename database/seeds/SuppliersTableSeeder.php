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
            '10332802000152',
            'M2 Print LTDA',
            'M2 Print',
            '487436245783',
            'Rua Leonardo Braz de Paula Lerco',
            'Jardim Residencial Morada das Flores',
            'Sorocaba',
            'SP',
            '18087758',
            '001',
            '0995',
            '123456'
        );

        $this->store(
            2,
            3,
            '12334804000154',
            'Silva Papeis EPP',
            'Papeis Silva',
            '247326125831',
            'Rua José Stilitano',
            'Jardim Leocádia',
            'Sorocaba',
            'SP',
            '18082123',
            '033',
            '3323',
            '337714'
        );

        $this->store(
            3,
            3,
            '01432702000163',
            'Chapas Andrade EPP',
            'Chapas Andrade',
            '345268123982',
            'Rua Benedito Ferreira Telles',
            'Vila São Caetano',
            'Sorocaba',
            'SP',
            '18055127',
            '652',
            '0995',
            '123456'
        );

        $this->store(
            4,
            3,
            '23636303003312',
            'Francisco Tintas Gráficas EPP',
            'Chico Tintas',
            '127138349281',
            'Rua Joana Maria Pereira',
            'Vila Adélia',
            'Sorocaba',
            'SP',
            '18080900',
            '001',
            '0995',
            '443525'
        );

        $this->store(
            5,
            2,
            '71122832000592',
            'Logística Lins Guimaraes',
            'Logística Lins',
            '223766145287',
            'Rua Fernandes Vieira',
            'Jardim dos Barões',
            'Sorocaba',
            'SP',
            '18060890',
            '237',
            '0995',
            '123456'
        );

        $this->store(
            6,
            2,
            '17832702001332',
            'New Man Computadores e Eletrônicos EPP',
            'New Man Computadores e Eletrônicos',
            '513413343613',
            'Rua Tabajaras',
            'Mooca',
            'São Paulo',
            'SP',
            '03121010',
            '001',
            '0328',
            '093454'
        );

        $this->store(
            7,
            1,
            '43862252001538',
            'Lunga Cá EPP',
            'Lunga Cá',
            '263473393644',
            'Rua José Carlos de Campos',
            'Vila Vasques',
            'Votorantim',
            'SP',
            '18110130',
            '001',
            '0898',
            '120458'
        );

        $this->store(
            8,
            1,
            '72652452100123',
            'Carlos Refrigerações EPP',
            'Carlos Refrigerações',
            '116633319127',
            'Rua Angelino Francisco Parri',
            'Parque Bela Vista',
            'Votorantim',
            'SP',
            '18110490',
            '652',
            '0238',
            '010735'
        );

        $this->store(
            9,
            1,
            '27681556000611',
            'Francis Móveis e Estofados EPP',
            'Francis Móveis e Estofados',
            '566235312845',
            'Rua José Bonifácio',
            'Jardim Brasil',
            'Atibaia',
            'SP',
            '12940210',
            '033',
            '4423',
            '017750'
        );

        $this->store(
            10,
            1,
            '36792445000384',
            'Almeida Cadeiras EPP',
            'Almeida Cadeiras',
            '246457214481',
            'Rua Jussara Adorno Gonçalves Gil',
            'Jardim Santa Catarina',
            'Sorocaba',
            'SP',
            '18079462',
            '033',
            '3323',
            '013775'
        );

        $this->store(
            11,
            2,
            '71480560000139',
            'SERVICO AUTONOMO DE AGUA E ESGOTO',
            'SAAE',
            '669573983111',
            'AVENIDA PEREIRA DA SILVA',
            'Jardim Santa Rosália',
            'Sorocaba',
            'SP',
            '18095340',
            '',
            '',
            ''
        );

        $this->store(
            12,
            2,
            '46634044000174',
            'PREFEITURA MUNICIPAL DE SOROCABA',
            'PMS',
            '669573983111',
            'AVENIDA Engenheiro Carlos Reinaldo Mendes',
            'Alto da Boa Vista',
            'Sorocaba',
            'SP',
            '18013280',
            '',
            '',
            ''
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
