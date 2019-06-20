<?php

use Illuminate\Database\Seeder;
use App\Models\Required;
use Carbon\Carbon;

class RequiredsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 'Cta_Multa');
        $this->store(2, 'Cta_Juros');
        $this->store(3, 'Cta_tempoProtesto');
        $this->store(4, 'Cta_valProtesto');
        $this->store(5, 'Cta_codBarra');
        $this->store(6, 'Cta_numConta');
    }

    public function store($id, $desc)
    {
        if (!Required::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Required::insert([
                'Rq_idRequeridos'       => $id,
                'Rq_DescrRequeridos'    => $desc,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
