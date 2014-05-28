<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$users = array(
			array(
				'user_name'  =>'admin',
				'email'      =>'admin@gmail.com',
				'age'      =>30,
				'phone_number'	=>	'01111111',
				'password'   => Hash::make('admin'),
				'role_id'    => 1,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			),
			array(
				'user_name'  =>'user',
				'email'      =>'user@gmail.com',
				'password'   => Hash::make('user'),
				'age'      =>30,
				'phone_number'	=>	'0156651',
				'role_id'    => 2,
				'created_at' => date('Y-m-d H-i-s'),
				'updated_at' => date('Y-m-d H-i-s')
			)
		);

		DB::table('users')->insert($users);
	}
}