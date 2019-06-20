<?php

use Illuminate\Database\Seeder;
use App\Models\RequiredsGroup;
use Carbon\Carbon;

class RequiredGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->store(1, 1, 1);
        $this->store(2, 2, 1);
        $this->store(3, 3, 1);
        $this->store(4, 4, 1);
        $this->store(5, 5, 1);
        $this->store(6, 6, 1);

        $this->store(7, 1, 2);
        $this->store(8, 2, 2);
        $this->store(9, 5, 2);
        $this->store(10, 6, 2);

        $this->store(11, 1, 3);
        $this->store(12, 2, 3);
        $this->store(13, 3, 3);
        $this->store(14, 4, 3);
        $this->store(15, 5, 3);
        $this->store(16, 6, 3);

        $this->store(17, 1, 4);
        $this->store(18, 2, 4);
        $this->store(19, 5, 4);
        $this->store(20, 6, 4);

        $this->store(21, 6, 5);
    }

    public function store($id, $idRequired, $idGroup)
    {
        if (!RequiredsGroup::find($id)) {

            $date = Carbon::now()->format('Y-m-d H:i:s');

            RequiredsGroup::insert([
                'id_Requireds_Group'    => $id,
                'idRequireds'           => $idRequired,
                'idGroup'               => $idGroup,
                'created_at'            => $date,
                'updated_at'            => $date
            ]);
        }
    }
}
