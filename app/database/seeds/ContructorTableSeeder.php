<?php

class ContructorTableSeeder extends Seeder {

	public function run()
	{
		$contructors = [
			[
				'location_id' => 1,
				'contructor_name' => 'Wayne Rooney'
			],
			[
				'location_id' => 2,
				'contructor_name' => 'Steven Gerrard'
			],
			[
				'location_id' => 3,
				'contructor_name' => 'Jack Wilshere'
			]

		];

		DB::table('contructors')->insert($contructors);
	}
}