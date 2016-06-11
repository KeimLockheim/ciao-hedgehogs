<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('refusedReason')->nullable();
			$table->boolean('highlighted')->default(false);
			$table->string('name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('topics');
	}
}