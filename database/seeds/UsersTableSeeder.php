<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, '10001', 'Administrador', Hash::make('fabio.aurelio'), 'Fábio Oliveira', 'fabio.aurelio@m2print.com');
        $this->store(2, '20002', 'Gerente', Hash::make('marco.aurelio'), 'Marco Aurélio', 'marco.aurelio@m2print.com');
        $this->store(3, '30003', 'Gerente', Hash::make('fabio.ferreira'), 'Fábio Ferreira', 'fabio.ferreira@m2print.com');
        $this->store(4, '40004', 'Analista', Hash::make('bruno.araujo'), 'Bruno Araújo', 'bruno.araujo@m2print.com');
        $this->store(5, '50005', 'Analista', Hash::make('aleksander.pettherson'), 'Aleksander Pettherson', 'aleksander.pettherson@m2print.com');
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
