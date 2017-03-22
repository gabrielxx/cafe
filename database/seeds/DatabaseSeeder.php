<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AddCompaniesSeeder::class);
        $this->call(AddAdminSeeder::class);
        $this->call(AddDriversSeeder::class);
        $this->call(AddTabulatorsSeeder::class);
        $this->call(AddSubsidiariesSeeder::class);
    }
}
