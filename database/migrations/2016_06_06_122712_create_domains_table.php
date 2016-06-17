<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTable extends Migration {

	public function up()
	{
		Schema::create('domains', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('description', 2000);
			$table->string('content', 20000)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('domains');
	}
}