<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceApplicatifsTable extends Migration {

	public function up()
	{
		Schema::create('serviceApplicatifs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
		});
	}

	public function down()
	{
		Schema::drop('serviceApplicatifs');
	}
}