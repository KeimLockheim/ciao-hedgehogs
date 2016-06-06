<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTable extends Migration {

	public function up()
	{
		Schema::create('post', function(Blueprint $table) {
			$table->increments('id');
			$table->string('content', 500);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('post');
	}
}