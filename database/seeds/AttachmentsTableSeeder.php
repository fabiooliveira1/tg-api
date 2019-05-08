<?php

use Illuminate\Database\Seeder;
use App\Models\Attachment;
use Carbon\Carbon;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 'String 1');
        $this->store(2, 1, 'String 2');
        $this->store(3, 1, 'String 3');
    }

    public function store($id, $num, $conteudo)
    {
        if (!Attachment::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Attachment::insert([
                'Anx_idAnexo'   => $id,
                'Anx_idConta'   => $num,
                'Anx_conteudo'  => $conteudo,
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }
    }
}
