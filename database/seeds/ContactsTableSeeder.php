<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Carbon\Carbon;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 'Marco', '15 98810-9999', 'Marco@fatec.com');
        $this->store(2, 1, 'Bruno', '15 98810-8888', 'Bruno@fatec.com');
        $this->store(3, 2, 'Aleksander', '15 98810-7777', 'Aleksander@fatec.com');
        $this->store(4, 2, 'Fabio A', '15 98810-6666', 'Fabio_A@fatec.com');
        $this->store(5, 3, 'Fabio F', '15 98810-5555', 'Fabio_F@fatec.com');
    }

    public function store($id, $idSupplier, $name, $phone, $email)
    {

        if (!Contact::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Contact::insert([
                'Cnt_idContato'     => $id,
                'Cnt_idFornecedor'  => $idSupplier,
                'Cnt_nomeContato'   => $name,
                'Cnt_phoneContato'  => $phone,
                'Cnt_emailContato'  => $email,
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
