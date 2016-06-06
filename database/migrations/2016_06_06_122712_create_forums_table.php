<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumsTable extends Migration {

	public function up()
	{
		Schema::create('forums', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('forums');
	}
}