<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerTable extends Migration {

	public function up()
	{
		Schema::create('answer', function(Blueprint $table) {
			$table->increments('id');
			$table->string('content', 1000);
			$table->boolean('public');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('answer');
	}
}