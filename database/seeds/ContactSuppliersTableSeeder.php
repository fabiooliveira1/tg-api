<?php

use Illuminate\Database\Seeder;
use App\Models\ContactSupplier;
use Carbon\Carbon;

class ContactSuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 1);
        $this->store(2, 2, 1);
        $this->store(3, 3, 2);
        $this->store(4, 4, 2);
        $this->store(5, 5, 3);
    }

    public function store($id, $idContact, $idSupllier)
    {
        if (!ContactSupplier::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            ContactSupplier::insert([
                'idContact_Supplier'    => $id,
                'idContact'             => $idContact,
                'idSupplier'            => $idSupllier,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
