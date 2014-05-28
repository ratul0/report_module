<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LocationTableSeeder extends Seeder {

	public function run()
	{
		$locations = [
			[
				'location_name' => 'Croxteth'
			],
			[
				'location_name' => 'Whiston'
			],
			[
				'location_name' => 'London'
			]

		];

		DB::table('locations')->insert($locations);
	}

}