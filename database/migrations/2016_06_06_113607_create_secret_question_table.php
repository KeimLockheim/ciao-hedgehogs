<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecretQuestionTable extends Migration {

	public function up()
	{
		Schema::create('secret_question', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
		});
	}

	public function down()
	{
		Schema::drop('secret_question');
	}
}