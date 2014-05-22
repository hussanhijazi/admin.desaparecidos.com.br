<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('Users');
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
	}

}
