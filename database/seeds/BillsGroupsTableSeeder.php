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
        $this->store(1, 3, 'Insumos', 'Contas de materiais essenciais');
        $this->store(2, 2, 'Transporte', 'Contas de Logistica');
        $this->store(3, 1, 'Boleto', 'Tipo de Boletos simples');
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
