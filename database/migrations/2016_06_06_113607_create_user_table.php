<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nickname', 20)->unique();
			$table->string('password', 255);
			$table->smallInteger('birthyear');
			$table->enum('sex', array('féminin', 'masculin'));
			$table->enum('localisation', array('Neuchâtel', 'Vaud', 'Genêve', 'Jura', 'Berne', 'Valais'));
			$table->string('secret_questionAnswer', 45);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('user');
	}
}