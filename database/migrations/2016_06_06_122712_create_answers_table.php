<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('content', 2000);
			$table->boolean('public');
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('answers');
	}
}