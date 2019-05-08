<?php

use Illuminate\Database\Seeder;
use App\Models\Risk;
use Carbon\Carbon;

class RisksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 'Baixo');
        $this->store(2, 'Medio');
        $this->store(3, 'Alto');
    }

    public function store($id, $desc)
    {
        if (!Risk::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Risk::insert([
                'Rsc_idRisco'       => $id,
                'Rsc_descrRisco'    => $desc,
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
