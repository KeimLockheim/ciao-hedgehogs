<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('content',2000);
			$table->boolean('public')->default(false);
			$table->integer('rating')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}