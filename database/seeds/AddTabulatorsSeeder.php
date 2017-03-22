<?php

use Illuminate\Database\Seeder;

class AddTabulatorsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){

		factory(App\Tabulator::class)->create([
			'km'			=> 26.76,
			'wait'			=> 583.18,
			'disposition'	=> 826.01,
			'sprint'		=> 804.50,
			'overnight'		=> 2869.29,
			'detour'		=> 26.76,
			'shipping'		=> 26.76,
			'night'			=> 0.20,
			'holiday'		=> 0.30,
			'category'		=> 1,
			'status'		=> 'active',
			'company_id'    => 1,
			'created_at'    => date('y-m-d H:i:s'),
			'updated_at'    => date('y-m-d H:i:s')
		]);

		factory(App\Tabulator::class)->create([
			'km'			=> 32.04,
			'wait'			=> 714.51,
			'disposition'	=> 1020.75,
			'sprint'		=> 959.88,
			'overnight'		=> 2869.29,
			'detour'		=> 32.04,
			'shipping'		=> 32.04,
			'night'			=> 0.20,
			'holiday'		=> 0.30,
			'category'		=> 2,
			'status'		=> 'active',
			'company_id'    => 1,
			'created_at'    => date('y-m-d H:i:s'),
			'updated_at'    => date('y-m-d H:i:s')
		]);




		factory(App\Tabulator::class)->create([
			'km'			=> 26.76,
			'wait'			=> 583.18,
			'disposition'	=> 826.01,
			'sprint'		=> 804.50,
			'overnight'		=> 2869.29,
			'detour'		=> 26.76,
			'shipping'		=> 26.76,
			'night'			=> 0.20,
			'holiday'		=> 0.30,
			'category'		=> 1,
			'status'		=> 'active',
			'company_id'    => 2,
			'created_at'    => date('y-m-d H:i:s'),
			'updated_at'    => date('y-m-d H:i:s')
		]);

		factory(App\Tabulator::class)->create([
			'km'			=> 32.04,
			'wait'			=> 714.51,
			'disposition'	=> 1020.75,
			'sprint'		=> 959.88,
			'overnight'		=> 2869.29,
			'detour'		=> 32.04,
			'shipping'		=> 32.04,
			'night'			=> 0.20,
			'holiday'		=> 0.30,
			'category'		=> 2,
			'status'		=> 'active',
			'company_id'    => 2,
			'created_at'    => date('y-m-d H:i:s'),
			'updated_at'    => date('y-m-d H:i:s')
		]);



		factory(App\Tabulator::class)->create([
			'km'			=> 26.76,
			'wait'			=> 583.18,
			'disposition'	=> 826.01,
			'sprint'		=> 804.50,
			'overnight'		=> 2869.29,
			'detour'		=> 26.76,
			'shipping'		=> 26.76,
			'night'			=> 0.20,
			'holiday'		=> 0.30,
			'category'		=> 1,
			'status'		=> 'active',
			'company_id'    => 3,
			'created_at'    => date('y-m-d H:i:s'),
			'updated_at'    => date('y-m-d H:i:s')
		]);

		factory(App\Tabulator::class)->create([
			'km'			=> 32.04,
			'wait'			=> 714.51,
			'disposition'	=> 1020.75,
			'sprint'		=> 959.88,
			'overnight'		=> 2869.29,
			'detour'		=> 32.04,
			'shipping'		=> 32.04,
			'night'			=> 0.20,
			'holiday'		=> 0.30,
			'category'		=> 2,
			'status'		=> 'active',
			'company_id'    => 3,
			'created_at'    => date('y-m-d H:i:s'),
			'updated_at'    => date('y-m-d H:i:s')
		]);

    }
}
