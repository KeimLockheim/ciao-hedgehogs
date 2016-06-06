<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumTable extends Migration {

	public function up()
	{
		Schema::create('forum', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 45);
			$table->string('description', 200);
		});
	}

	public function down()
	{
		Schema::drop('forum');
	}
}