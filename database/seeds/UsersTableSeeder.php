<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, '10001', 'Avançado', 'Senha_1', 'Fábio Aurélio', 'fabioaurelio@m2print.com');
        $this->store(2, '20002', 'Basico', 'Senha_2', 'Fábio Ferreira', 'fabioferreira@m2print.com');
        $this->store(3, '30003', 'Normal', 'Senha_3', 'Aleksander Pettherson', 'aleksanderpettherson@m2print.com');
        $this->store(4, '40004', 'Normal', 'Senha_4', 'Bruno Aráujo', 'brunoaraujo@m2print.com');
        $this->store(5, '50005', 'Normal', 'Senha_5', 'Marco Aurélio', 'Marco@m2print.com');
    }

    public function store($id, $matricula, $nvAcesso, $key, $name, $email)
    {

        if (!User::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            User::insert([
                'User_idUsuario'    => $id,
                'User_matricula'    => $matricula,
                'User_nivelAcesso'  => $nvAcesso,
                'User_senha'        => $key,
                'User_nome'         => $name,
                'User_email'        => $email,
                'created_at'        => $date,
                'updated_at'        => $date
            ]);
        }
    }
}
