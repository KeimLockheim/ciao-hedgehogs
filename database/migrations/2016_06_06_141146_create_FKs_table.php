<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //answers
        Schema::table('answers',function(Blueprint $table){
            $table->integer('answered_by')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->foreign('answered_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });

        //domains
        Schema::table('domains',function(Blueprint $table){
            $table->integer('parentDomain_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned();

            $table->foreign('parentDomain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });

        //userProfile
        Schema::table('userProfile',function(Blueprint $table){
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        //posts
        Schema::table('posts',function(Blueprint $table){
            $table->integer('topic_id')->unsigned();
            $table->integer('written_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->integer('parentPost_id')->unsigned()->nullable();

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('written_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parentPost_id')->references('id')->on('posts')->onDelete('cascade');
        });

        //questions
        Schema::table('questions',function(Blueprint $table){
            $table->integer('asked_by')->unsigned();
            $table->integer('domain_id')->unsigned();
            $table->integer('subDomain_id')->unsigned()->nullable();

            $table->foreign('asked_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('subDomain_id')->references('id')->on('domains')->onDelete('cascade');

        });

        //topics
        Schema::table('topics',function(Blueprint $table){
            $table->integer('domain_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('validated_by')->unsigned()->nullable();

            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('validated_by')->references('id')->on('users')->onDelete('cascade');
        });

        //users
        Schema::table('users',function(Blueprint $table){
            $table->integer('secretQuestion_id')->unsigned();

            $table->foreign('secretQuestion_id')->references('id')->on('secretQuestions')->onDelete('cascade');
        });

        //urgencies
        Schema::table('urgencies',function(Blueprint $table){
            $table->integer('domain_id')->unsigned();

            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //users
        Schema::table('users',function(Blueprint $table){
            //$table->dropForeign('secretQuestion_id');
            //$table->dropColumn('secretQuestion_id');
        });

        //answers
        Schema::table('answers',function(Blueprint $table){
            //$table->dropForeign('answered_by');
            //$table->dropColumn('answered_by');
            //$table->dropForeign('question_id');
            //$table->dropColumn('question_id');
        });

        //domains
        Schema::table('domains',function(Blueprint $table){
            //$table->dropForeign('parentDomain_id');
            //$table->dropColumn('parentDomain_id');
            //$table->dropForeign('created_by');
            //$table->dropColumn('created_by');
        });

        //userProfile
        Schema::table('userProfile',function(Blueprint $table){
            //$table->dropColumn('user_id');
        });

        //posts
        Schema::table('posts',function(Blueprint $table){
            //$table->dropForeign('topic_id');
            //$table->dropColumn('topic_id');
            //$table->dropForeign('written_by');
            //$table->dropColumn('written_by');
            //$table->dropForeign('updated_by');
            //$table->dropColumn('updated_by');
            //$table->dropForeign('deleted_by');
            //$table->dropColumn('deleted_by');
            //$table->dropForeign('parentPost_id');
            //$table->dropColumn('parentPost_id');
        });

        //questions
        Schema::table('questions',function(Blueprint $table){
            /*$table->dropForeign('domain_id');
            $table->dropColumn('domain_id');
            $table->dropForeign('subDomain_id');
            $table->dropColumn('subDomain_id');
            $table->dropForeign('asked_by');
            $table->dropColumn('asked_by');*/
        });

        //topics
        Schema::table('topics',function(Blueprint $table){
            /*$table->dropForeign('domain_id');
            $table->dropColumn('domain_id');
            $table->dropForeign('created_by');
            $table->dropColumn('created_by');
            $table->dropForeign('updated_by');
            $table->dropColumn('updated_by');
            $table->dropForeign('validated_by');
            $table->dropColumn('validated_by');*/
        });

        //urgencies
        Schema::table('urgencies',function(Blueprint $table){
            //$table->dropColumn('domain_id');
        });


    }
}
