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
        $this->store(1, 'Nosso numero');
        $this->store(2, 'Valor');
        $this->store(3, 'Data Vencimento');
        $this->store(4, 'Valor Total');
        $this->store(5, 'Codigo de barras');
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
