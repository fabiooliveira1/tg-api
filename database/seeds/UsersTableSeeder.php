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
        $this->store(1, '10001', 'A', 'Senha_1', 'Levi Munhoz', 'Levi@fatec.com');
        $this->store(2, '20002', 'B', 'Senha_2', 'Cesar Munari', 'Cesar@fatec.com');
        $this->store(3, '30003', 'C', 'Senha_3', 'Maria Angelica', 'Maria@fatec.com');
        $this->store(4, '40004', 'D', 'Senha_4', 'Miranda', 'Miranda@fatec.com');
        $this->store(5, '50005', 'E', 'Senha_5', 'Maze Cardoso', 'Maze@fatec.com');
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
