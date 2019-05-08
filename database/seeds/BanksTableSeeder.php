<?php

use Illuminate\Database\Seeder;
use App\Models\Bank;
use Carbon\Carbon;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, '341', 'Banco Itaú S.A');
        $this->store(2, '033', 'Banco Santander (Brasil) S.A.');
        $this->store(3, '356', 'Banco Real S.A. (antigo)');
        $this->store(4, '652', 'Itaú Unibanco Holding S.A.');
        $this->store(5, '237', 'Banco Bradesco S.A.');
        $this->store(6, '745', 'Banco Citibank S.A.');
        $this->store(7, '399', 'HSBC Bank Brasil S.A. – Banco Múltiplo.');
        $this->store(8, '001', 'Banco do Brasil S.A.');
    }

    public function store($id, $num, $name)
    {
        if (!Bank::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Bank::insert([
                'Bc_idBanco'    => $id,
                'Bc_numBanco'   => $num,
                'Bc_nomeBanco'  => $name,
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }
    }
}
