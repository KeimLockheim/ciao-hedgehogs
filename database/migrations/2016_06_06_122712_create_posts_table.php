<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('content', 1000);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}