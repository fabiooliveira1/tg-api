<?php

use Illuminate\Database\Seeder;
use App\Models\SimulationsBill;
use Carbon\Carbon;

class SimulationBillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 1);
        $this->store(2, 1, 2);
        $this->store(3, 1, 3);
        $this->store(4, 2, 1);
        $this->store(5, 2, 2);
    }

    public function store($id, $idSimul, $idBill)
    {
        if (!SimulationsBill::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            SimulationsBill::insert([
                'idSimulations_Bill'    => $id,
                'idSimulations'         => $idSimul,
                'idBill'                => $idBill,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
