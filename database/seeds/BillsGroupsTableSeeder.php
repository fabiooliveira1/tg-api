<?php

use Illuminate\Database\Seeder;
use App\Models\BillsGroup;
use Carbon\Carbon;

class BillsGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 3, 'Contas Essenciais', 'Contas de materiais diretamente ligados ao produto');
        $this->store(2, 2, 'Despesas Regulares', 'Contas de Logística, transporte');
        $this->store(3, 1, 'Contas Secundarias', 'Contas de materiais improdutivos');
        $this->store(4, 1, 'Tributos Municipais', 'Impostos');
        $this->store(5, 1, 'Transferência Bancária', 'Contas por transferências bancárias DOC/TED');
    }

    public function store($id, $idRisk, $name, $desc)
    {

        if (!BillsGroup::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            BillsGroup::insert([
                'GrCt_idGrupo'      => $id,
                'GrCt_idRisco'      => $idRisk,
                'GrCt_NomeGrupo'    => $name,
                'GrCt_DescrGrupo'   => $desc,
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
