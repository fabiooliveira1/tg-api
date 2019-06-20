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
            'M2 Print LTDA',
            'M2 Print',
            '487.436.245.783',
            'Rua Leonardo Braz de Paula Lerco',
            'Jardim Residencial Morada das Flores',
            'Sorocaba',
            'SP',
            '18087-758',
            'Banco do Brasil S.A.',
            '0995',
            '12345-6'
        );

        $this->store(
            2,
            3,
            '12.334.804/0001-54',
            'Silva Papeis EPP',
            'Papeis Silva',
            '247.326.125.831',
            'Rua José Stilitano',
            'Jardim Leocádia',
            'Sorocaba',
            'SP',
            '18082-123',
            'Banco Santander S.A.',
            '3323',
            '33771-4'
        );

        $this->store(
            3,
            3,
            '01.432.702/0001-63',
            'Chapas Andrade EPP',
            'Chapas Andrade',
            '345.268.123.982',
            'Rua Benedito Ferreira Telles',
            'Vila São Caetano',
            'Sorocaba',
            'SP',
            '18055-127',
            'Itaú Unibanco S.A.',
            '0995',
            '12345-6'
        );

        $this->store(
            4,
            3,
            '23.636.303/0033-12',
            'Francisco Tintas Gráficas EPP',
            'Chico Tintas',
            '127.138.349.281',
            'Rua Joana Maria Pereira',
            'Vila Adélia',
            'Sorocaba',
            'SP',
            '18080-900',
            'Banco do Brasil S.A.',
            '0995',
            '44352-5'
        );

        $this->store(
            5,
            2,
            '71.122.832/0005-92',
            'Logística Lins Guimaraes',
            'Logística Lins',
            '223.766.145.287',
            'Rua Fernandes Vieira',
            'Jardim dos Barões',
            'Sorocaba',
            'SP',
            '18060-890',
            'Banco Bradesco S.A.',
            '0995',
            '12345-6'
        );

        $this->store(
            6,
            2,
            '17.832.702/0013-32',
            'New Man Computadores e Eletrônicos EPP',
            'New Man Computadores e Eletrônicos',
            '513.413.343.613',
            'Rua Tabajaras',
            'Mooca',
            'São Paulo',
            'SP',
            '03121-010',
            'Banco do Brasil S.A.',
            '0328',
            '09345-4'
        );

        $this->store(
            7,
            1,
            '43.862.252/0015-38',
            'Lunga Cá EPP',
            'Lunga Cá',
            '263.473.393.644',
            'Rua José Carlos de Campos',
            'Vila Vasques',
            'Votorantim',
            'SP',
            '18110-130',
            'Banco do Brasil S.A.',
            '0898',
            '12045-8'
        );

        $this->store(
            8,
            1,
            '72.652.452/1001-23',
            'Carlos Refrigerações EPP',
            'Carlos Refrigerações',
            '116.633.319.127',
            'Rua Angelino Francisco Parri',
            'Parque Bela Vista',
            'Votorantim',
            'SP',
            '18110-490',
            'Itaú Unibanco S.A.',
            '0238',
            '01073-5'
        );

        $this->store(
            9,
            1,
            '27.681.556/0006-11',
            'Francis Móveis e Estofados EPP',
            'Francis Móveis e Estofados',
            '566.235.312.845',
            'Rua José Bonifácio',
            'Jardim Brasil',
            'Atibaia',
            'SP',
            '12940-210',
            'Banco Santander S.A.',
            '4423',
            '01775-0'
        );

        $this->store(
            10,
            1,
            '36.792.445/0003-84',
            'Almeida Cadeiras EPP',
            'Almeida Cadeiras',
            '246.457.214.481',
            'Rua Jussara Adorno Gonçalves Gil',
            'Jardim Santa Catarina',
            'Sorocaba',
            'SP',
            '18079-462',
            'Banco Santander S.A.',
            '3323',
            '01377-5'
        );

        $this->store(
            11,
            2,
            '71.480.560/0001-39',
            'SERVICO AUTONOMO DE AGUA E ESGOTO',
            'SAAE',
            '669.573.983.111',
            'AVENIDA PEREIRA DA SILVA',
            'Jardim Santa Rosália',
            'Sorocaba',
            'SP',
            '18095-340',
            '',
            '',
            ''
        );

        $this->store(
            12,
            2,
            '46.634.044/0001-74',
            'PREFEITURA MUNICIPAL DE SOROCABA',
            'PMS',
            '669.573.983.111',
            'AVENIDA Engenheiro Carlos Reinaldo Mendes',
            'Alto da Boa Vista',
            'Sorocaba',
            'SP',
            '18013-280',
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
