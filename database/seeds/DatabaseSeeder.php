<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BanksTableSeeder::class);
        $this->call(AgencyBanksTableSeeder::class);
        $this->call(AccountBanksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RequiredsTableSeeder::class);
        $this->call(PaymentWaysTableSeeder::class);
        $this->call(RisksTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(SimulationsTableSeeder::class);
        $this->call(BillsGroupsTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(RenegotiationsTableSeeder::class);
        // $this->call(AttachmentsTableSeeder::class);
        $this->call(PaymentSuppliersTableSeeder::class);
        $this->call(RequiredGroupsTableSeeder::class);
        $this->call(SimulationBillsTableSeeder::class);
    }
}
