<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nickname')->unique();
			$table->string('password');
			$table->smallInteger('birthyear');
			$table->enum('sex', array('féminin', 'masculin'));
			$table->string('localisation');
			$table->string('secretQuestionAnswer');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}