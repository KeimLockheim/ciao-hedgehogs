<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupServiceApplicatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_serviceApplicatif', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->integer('serviceApplicatif_id')->unsigned();

            $table->foreign('serviceApplicatif_id')->references('id')->on('serviceApplicatifs');
            $table->foreign('group_id')->references('id')->on('groups');


            //Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_serviceApplicatif');
    }
}
