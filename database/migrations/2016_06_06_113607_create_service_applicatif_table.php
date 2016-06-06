<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceApplicatifTable extends Migration {

	public function up()
	{
		Schema::create('service_applicatif', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
		});
	}

	public function down()
	{
		Schema::drop('service_applicatif');
	}
}