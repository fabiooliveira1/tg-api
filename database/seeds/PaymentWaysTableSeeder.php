<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentWay;
use Carbon\Carbon;

class PaymentWaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 'A vista');
        $this->store(2, 'Boleto');
        $this->store(3, 'Faturado');
        $this->store(4, 'Credito');
        $this->store(5, 'Parcelado');
    }

    public function store($id, $desc)
    {
        if (!PaymentWay::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            PaymentWay::insert([
                'FrPg_idFormaPgto'      => $id,
                'FrPg_descrFormaPgto'   => $desc,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
