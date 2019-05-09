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
        $this->store(1, 'Cta_numConta');
        $this->store(2, 'Cta_descrConta');
        $this->store(3, 'Cta_dataEmissao');
        $this->store(4, 'Cta_dataVencimento');
        $this->store(5, 'Cta_dataPagto');
        $this->store(6, 'Cta_dataBaixa');
        $this->store(7, 'Cta_codBarra');
        $this->store(8, 'Cta_valConta');
        $this->store(9, 'Cta_totalConta');
        $this->store(10, 'Cta_tempoProtesto');
        $this->store(11, 'Cta_valProtesto');
        $this->store(12, 'Cta_Multa');
        $this->store(13, 'Cta_Juros');
        $this->store(14, 'Cta_Status');
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
