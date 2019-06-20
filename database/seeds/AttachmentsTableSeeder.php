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
        // $this->store(1, 1, 'Arquivo 1', 'PDF', '');
        // $this->store(2, 1, 'Arquivo 2', 'DOCX', '');
        // $this->store(3, 1, 'Arquivo 3', 'JPEG', '');
    }

    public function store($id, $num, $nome, $formato, $endereco)
    {
        if (!Attachment::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            Attachment::insert([
                'Anx_idAnexo'   => $id,
                'Anx_idConta'   => $num,
                'Anx_nome'      => $nome,
                'Anx_formato'   => $formato,
                'Anx_endereco'  => $endereco,
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }
    }
}
