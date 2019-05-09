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
        $this->store(2, 1, 2);
        $this->store(3, 1, 3);
        $this->store(4, 2, 1);
        $this->store(5, 2, 2);
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
