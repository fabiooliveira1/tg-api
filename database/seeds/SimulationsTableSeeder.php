<?php

use Illuminate\Database\Seeder;
use App\Models\Simulation;
use Carbon\Carbon;

class SimulationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, '2019-05-10', '1000', '2000', 'Pendente');
        $this->store(2, 1, '2019-05-10', '2000', '4000', 'Aprovado');
        $this->store(3, 2, '2019-05-10', '3000', '6000', 'Rejeitado');
    }

    public function store($id, $idCc, $dtPgSim, $valSim, $valTotal, $status)
    {
        if (!Simulation::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Simulation::insert([
                'Sim_idSimulacao'           => $id,
                'Sim_idContaBancaria'       => $idCc,
                'Sim_dataPagtoSimulacao'    => $dtPgSim,
                'Sim_valSimulacao'          => $valSim,
                'Sim_valTotal'              => $valTotal,
                'Sim_status'                => $status,
                'created_at'                => $date,
                'updated_at'                => $date
            ]);
        }
    }
}
