<?php

use Illuminate\Database\Seeder;

class AddSubsidiariesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

		factory(App\Subsidiary::class)->create([
			'name'			=> 'PDVSA GAS S.A.',
			'rif'			=> 'J-00076727-0',
			'status'		=> 'active',
			'company_id'	=> 1,
		]);
		factory(App\Subsidiary::class)->create([
			'name'			=> 'PDVSA PETROLEO S.A.',
			'rif'			=> 'J-00123072-6',
			'status'		=> 'active',
			'company_id'	=> 1,
		]);
		factory(App\Subsidiary::class)->create([
			'name'			=> 'PETROLEOS DE VENEZUELA S.A.',
			'rif'			=> 'J-00095036-9',
			'status'		=> 'active',
			'company_id'	=> 1,
		]);


		factory(App\Subsidiary::class)->create([
			'name'			=> 'PDVSA GAS S.A.',
			'rif'			=> 'J-00076727-0',
			'status'		=> 'active',
			'company_id'	=> 2,
		]);
		factory(App\Subsidiary::class)->create([
			'name'			=> 'PDVSA PETROLEO S.A.',
			'rif'			=> 'J-00123072-6',
			'status'		=> 'active',
			'company_id'	=> 2,
		]);
		factory(App\Subsidiary::class)->create([
			'name'			=> 'PETROLEOS DE VENEZUELA S.A.',
			'rif'			=> 'J-00095036-9',
			'status'		=> 'active',
			'company_id'	=> 2,
		]);


		factory(App\Subsidiary::class)->create([
			'name'			=> 'PDVSA GAS S.A.',
			'rif'			=> 'J-00076727-0',
			'status'		=> 'active',
			'company_id'	=> 3,
		]);
		factory(App\Subsidiary::class)->create([
			'name'			=> 'PDVSA PETROLEO S.A.',
			'rif'			=> 'J-00123072-6',
			'status'		=> 'active',
			'company_id'	=> 3,
		]);
		factory(App\Subsidiary::class)->create([
			'name'			=> 'PETROLEOS DE VENEZUELA S.A.',
			'rif'			=> 'J-00095036-9',
			'status'		=> 'active',
			'company_id'	=> 3,
		]);
    }
}
