<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecretQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('secretQuestions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50)->unique();
		});
	}

	public function down()
	{
		Schema::drop('secretQuestions');
	}
}