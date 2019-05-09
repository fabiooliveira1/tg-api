<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentSupplier;
use Carbon\Carbon;

class PaymentSuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 1);
        $this->store(2, 2, 2);
        $this->store(3, 3, 3);
    }

    public function store($id, $idPayment, $idSupplier)
    {
        if (!PaymentSupplier::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            PaymentSupplier::insert([
                'idPayment_Supplier'    => $id,
                'idPaymentWay'          => $idPayment,
                'idSupplier'            => $idSupplier,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
