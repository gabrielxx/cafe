<?php

use Illuminate\Database\Seeder;

class AddDriversSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(App\Driver::class)->create([
            'id'    		=> '14855915',
            'name'     		=> 'Johnnatan Rojas',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0426) 586 4493',
            'company_id'    => 1,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'    		=> '19708232',
            'name'     		=> 'Daniel Brazon',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0416) 080 3388',
            'company_id'    => 1,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);

        factory(App\Driver::class)->create([
            'id'            => '4944464',
            'name'          => 'Yoel Urbano',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0414) 780 0029',
            'company_id'    => 2,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '15787095',
            'name'          => 'Michel  Ugas',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0426) 384 4821',
            'company_id'    => 2,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '7110287',
            'name'          => 'Cesar  Gattinella',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0416) 784 9805',
            'company_id'    => 2,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '10880303',
            'name'          => 'Joan Rojas',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0416) 681 6410',
            'company_id'    => 2,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);

        factory(App\Driver::class)->create([
            'id'            => '18215059',
            'name'          => 'Luis Augusto Diaz Cedeño',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0424) 840 7318',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '14422388',
            'name'          => 'Luis Rafael Diaz Cedeño',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0414) 838 1919',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '4295530',
            'name'          => 'Jesus Gonzalez',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0414) 994 2657',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '11443636',
            'name'          => 'Augusto Cedeño',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0426) 582 1162',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '12291639',
            'name'          => 'Jairo Sanchez',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0424) 886 1068',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '6953661',
            'name'          => 'Gerardo Fermin',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0416) 384 9427',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '14290266',
            'name'          => 'Robertson Mendez',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '04164942057',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '13293215',
            'name'          => 'Wilman Cedeño',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0426) 186 9047',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
        factory(App\Driver::class)->create([
            'id'            => '14660569',
            'name'          => 'Luis Beltran Diaz',
            'category'      => '2',
            'type'          => 'Registrado',
            'phone_number'  => '(0000) 000 0000',
            'company_id'    => 3,
            'created_at'    => date('y-m-d H:i:s'),
            'updated_at'    => date('y-m-d H:i:s')
        ]);
    }
}
