<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBacklinksTable extends Migration {

	public function up()
	{
		Schema::create('backlinks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('check_url');
			$table->text('link_one');
			$table->text('link_two');
			$table->text('link_three');
			$table->smallInteger('check_count');
		});
	}

	public function down()
	{
		Schema::drop('backlinks');
	}
}