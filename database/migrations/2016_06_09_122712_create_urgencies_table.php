<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urgency', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('noTelephone');
            $table->string('email');
            $table->string('webSite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('urgency');
    }
}
