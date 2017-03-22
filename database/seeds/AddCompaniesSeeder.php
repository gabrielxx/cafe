<?php

use Illuminate\Database\Seeder;

class AddCompaniesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(App\Company::class)->create([
            'name'      => 'Caribes Pariano',
            'rif'       => 'J-30975647-8',
            'email'     => 'admin@caribespariano.org.ve',
            'web'       => 'caribespariano.org.ve',
            'owner'     => 'Johnatan Rojas',
            'status'    => 'active',
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);


        factory(App\Company::class)->create([
            'name'      => 'Los Panas',
            'color'      => 'red',
            'rif'       => 'J-29538121-2',
            'email'     => 'admin@lospanas.org.ve',
            'web'       => 'lospanas.org.ve',
            'owner'     => 'Joan Rojas',
            'status'    => 'active',
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);


        factory(App\Company::class)->create([
            'name'      => 'Sunamy',
            'color'      => 'blue',
            'rif'       => 'J-31654893-7',
            'email'     => 'admin@sunamy.org.ve',
            'web'       => 'sunamy.org.ve',
            'owner'     => 'Esteban Sanchez',
            'status'    => 'active',
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
    }
}




