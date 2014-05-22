<?php

class Users extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('1q2w3e'),
		));
	}

}
