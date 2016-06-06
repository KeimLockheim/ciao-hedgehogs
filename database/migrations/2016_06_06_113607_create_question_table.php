<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionTable extends Migration {

	public function up()
	{
		Schema::create('question', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 45);
			$table->string('content', 1000);
			$table->boolean('public');
			$table->integer('rating')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('question');
	}
}