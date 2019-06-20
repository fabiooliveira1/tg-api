<?php

use Illuminate\Database\Seeder;
use App\Models\AgencyBank;
use Carbon\Carbon;

class AgencyBanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 8, '0095', 'Votorantim', 'Ana Carolina', '15 98810-1010', 'anacarolina@bb.com.br'); 
        $this->store(2, 8, '0094', 'Sorocaba', 'Denilce Veloso', '15 98810-2020', 'denilceveloso@bb.com.br'); 
        $this->store(3, 1, '1234', 'Itu', 'Edméia Soares', '15 98810-3030', 'edmeiasoares@itau-unibanco.com.br'); 
        $this->store(4, 1, '1235', 'Salto', 'Carlos Dias', '15 98810-4040', 'carlosdias@itau-unibanco.com.br'); 
        $this->store(5, 2, '4567', 'Boituva', 'Francisco Carlos', '15 98810-5050', 'franciscocarlos@gruposantander.com'); 
    }

    public function store($id, $idBank, $num, $nameAg, $nameGer, $phone, $email)
    {
        if (!AgencyBank::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            AgencyBank::insert([
                'AgBc_idAgencia'    => $id,
                'AgBc_idBanco'      => $idBank,
                'AgBc_numAgencia'   => $num,
                'AgBc_nomeAgencia'  => $nameAg,
                'AgBc_nomeGerente'  => $nameGer,
                'AgBc_phoneGerente' => $phone,
                'AgBc_emailGerente' => $email,
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
