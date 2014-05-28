<?php

class VisitTableSeeder extends Seeder {

	public function run()
	{
		$visits = array(
			array(

				'location_id'      =>1,
				'visit_hours'      =>10,
				'visited_at' => "28-5-2014"
			),
			array(
				'location_id'      =>1,
				'visit_hours'      =>13,
				'visited_at' => "29-5-2014"
			)
		);

		DB::table('visit')->insert($visits);
	}
}