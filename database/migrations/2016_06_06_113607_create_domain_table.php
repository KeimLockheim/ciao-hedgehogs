<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainTable extends Migration {

	public function up()
	{
		Schema::create('domain', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 45)->unique();
			$table->string('content', 20000);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('domain');
	}
}