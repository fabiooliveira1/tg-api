<?php

use Illuminate\Database\Seeder;
use App\Models\AccountBank;
use Carbon\Carbon;

class AccountBanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, '123456', '1000');
        $this->store(2, 1, '654321', '2000');
        $this->store(3, 2, '111111', '3000');
        $this->store(4, 2, '222222', '4000');
        $this->store(5, 3, '333333', '5000');
    }

    public function store($id, $idAg, $num, $saldo)
    {
        if (!AccountBank::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            AccountBank::insert([
                'CtBc_idContaBancaria'  => $id,
                'CtBc_idAgencia'        => $idAg,
                'CtBc_numContaBancaria' => $num,
                'CtBc_Saldo'            => $saldo,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
