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
        $this->store(1, 1,  1);
        $this->store(2, 2,  1);
        $this->store(3, 3,  1);
        $this->store(4, 4,  1);
        $this->store(5, 1,  2);
        $this->store(6, 2,  2);
        $this->store(7, 3,  2);
        $this->store(8, 4,  2);
        $this->store(9, 1,  3);
        $this->store(10, 2, 3);
        $this->store(11, 3, 3);
        $this->store(12, 4, 3);
        $this->store(13, 1, 4);
        $this->store(14, 2, 4);
        $this->store(15, 3, 4);
        $this->store(16, 4, 4);
        $this->store(17, 1, 5);
        $this->store(18, 2, 5);
        $this->store(19, 1, 6);
        $this->store(20, 2, 6);
        $this->store(21, 2, 7);
        $this->store(22, 2, 8);
        $this->store(23, 2, 9);
        $this->store(24, 2, 10);
        $this->store(25, 2, 11);
        $this->store(26, 2, 12);
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
