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
        $this->store(1,  1, 'Cristiane Palomar', '15 988109999', 'cristianepalomar@m2print.com');
        $this->store(2,  2, 'Maria das Graças', '15 988108888', 'mariadasgracas@papeissilva.com');
        $this->store(3,  2, 'Jefferson Blaitt', '15 988108888', 'jeffersonblaitt@papeissilva.com');
        $this->store(4,  3, 'Maria Angélica', '15 988107777', 'mariaangelica@chapasandrade.com');
        $this->store(5,  4, 'Antonio Sergio Bernardo',  '15 988106666', 'Sergiobernardo@chicotintas.com');
        $this->store(6,  5, 'Daniella Arruda',  '15 988105555', 'daniellaarruda@logisticalins.com');
        $this->store(7,  6, 'Dimas Cardoso',  '11 977754545', 'dimascardoso@newman.com');
        $this->store(8,  7, 'Levi Munhoz', '15 991231212', 'levimunhoz@lungaca.com');
        $this->store(9,  8, 'Cesar Munari',   '15 995566767', 'cesarmunari@carlosrefriger.com');
        $this->store(10, 9, 'Fernando Miranda',  '11 997773443', 'fernandomiranda@francismoveis.com');
        $this->store(11, 10, 'José Bordieri',    '15 992348899', 'josebordieri@almeidacadeiras.com');
        $this->store(12, 11, 'SAAE', '15 981580442', 'saae@sorocaba.sp.gov.br');
        $this->store(13, 12, 'PMS',  '15 32382100',  'prefeitura@sorocaba.sp.gov.br');
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
