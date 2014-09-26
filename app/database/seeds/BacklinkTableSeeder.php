<?php

class BacklinkTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('backlinks')->delete();

		// testdiyetisyenim
		Backlink::create(array(
				'check_url' => 'http://www.diyetisyenim.org',
				'link_one' => 'www.diyetisyenim.org',
				'link_two' => 'www.alkamine.org',
				'link_three' => 'www.bitkirehberi.net',
				'check_count' => 2
			));
	}
}