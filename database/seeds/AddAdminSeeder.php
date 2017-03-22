<?php

use Illuminate\Database\Seeder;

class AddAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        /*factory(App\User::class)->create([
            'first_name'    => 'Joel',
            'last_name'     => 'Crespo',
            'role'          => 'root',
            'phone_number'  => '(1233) 312 1231',
            'email'         => 'casthielle@gmail.com',
            'password'      => Hash::make('Mqxe23ow456.'),
            'company_id'    => 2,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);

        factory(App\User::class)->create([
            'first_name'    => 'Joanny',
            'last_name'     => 'Rojas',
            'role'          => 'Administrador',
            'phone_number'  => '(0414) 895 2127',
            'email'         => 'joannyerb@hotmail.com',
            'password'      => Hash::make('21012281jj'),
            'company_id'    => 2,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);

        factory(App\User::class)->create([
            'first_name'    => 'Johnnatan',
            'last_name'     => 'Rojas',
            'role'          => 'Administrador',
            'phone_number'  => '(1233) 312 1231',
            'email'         => 'caribespariano@gmail.com',
            'password'      => Hash::make('caribes.2016'),
            'company_id'    => 1,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);*/

        factory(App\User::class)->create([
            'first_name'    => 'Demo',
            'last_name'     => 'Demo',
            'role'          => 'Administrador',
            'phone_number'  => '(0424) 840 7318',
            'email'         => 'demo@demo.com ',
            'password'      => Hash::make('demo1234.'),
            'company_id'    => 1,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
    }
}
