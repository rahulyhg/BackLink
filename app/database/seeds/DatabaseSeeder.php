<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('BacklinkTableSeeder');
		$this->command->info('Backlink table seeded!');
	}
}