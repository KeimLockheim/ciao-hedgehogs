<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfileTable extends Migration {

	public function up()
	{
		Schema::create('userProfile', function(Blueprint $table) {
			$table->increments('id');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('email')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('userProfile');
	}
}