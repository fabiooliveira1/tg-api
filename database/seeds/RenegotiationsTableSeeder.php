<?php

use Illuminate\Database\Seeder;
use App\Models\Renegotiation;
use Carbon\Carbon;

class RenegotiationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 1, 1000, '2019-05-10', 1500, '2019-05-15', 'Reneg 1', 'M2 Print 1', 'A');
        $this->store(2, 2, 2, 2000, '2019-05-10', 1700, '2019-05-15', 'Reneg 2', 'M2 Print 2', 'B');
        $this->store(3, 3, 3, 3000, '2019-05-10', 1900, '2019-05-15', 'Reneg 3', 'M2 Print 3', 'C');
    }

    public function store(
        $id,
        $idConta,
        $idContato,
        $valProposta,
        $vencProposta,
        $valAntigo,
        $vencAntigo,
        $desc,
        $inic,
        $status
    ) {

        if (!Renegotiation::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Renegotiation::insert([
                'Rng_idProposta'    => $id,
                'Rng_idConta'       => $idConta,
                'Rng_idContato'     => $idContato,
                'Rng_valProposta'   => $valProposta,
                'Rng_vencProposta'  => $vencProposta,
                'Rng_valAntigo'     => $valAntigo,
                'Rng_vencAntigo'    => $vencAntigo,
                'Rng_descrProposta' => $desc,
                'Rng_Iniciativa'    => $inic,
                'Rng_Status'        => $status,
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
