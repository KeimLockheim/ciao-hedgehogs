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

        //forums
        Schema::table('forums',function(Blueprint $table){
            $table->integer('domain_id')->unsigned();
            $table->integer('created_by')->unsigned();

            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });

        //posts
        Schema::table('posts',function(Blueprint $table){
            $table->integer('topic_id')->unsigned();
            $table->integer('written_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->integer('parentPost_id')->unsigned();

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
            $table->integer('forum_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->integer('validated_by')->unsigned()->nullable();

            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('validated_by')->references('id')->on('users')->onDelete('cascade');
        });

        //users
        Schema::table('users',function(Blueprint $table){
            $table->integer('secretQuestion_id')->unsigned();

            $table->foreign('secretQuestion_id')->references('id')->on('secretQuestions')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //answers
        Schema::table('answers',function(Blueprint $table){
            $table->dropColumn('answered_by');
            $table->dropColumn('question_id');
        });

        //domains
        Schema::table('domains',function(Blueprint $table){
            $table->dropColumn('parentDomain_id');
            $table->dropColumn('created_by');
        });

        //forums
        Schema::table('forums',function(Blueprint $table){
            $table->dropColumn('domain_id');
            $table->dropColumn('created_by');
        });

        //posts
        Schema::table('posts',function(Blueprint $table){
            $table->dropColumn('topic_id');
            $table->dropColumn('written_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('deleted_by');
            $table->dropColumn('parentPost_id');
        });

        //questions
        Schema::table('questions',function(Blueprint $table){
            $table->dropColumn('domain_id');
            $table->dropColumn('subDomain_id');
            $table->dropColumn('asked_by');
        });

        //topics
        Schema::table('topics',function(Blueprint $table){
            $table->dropColumn('forum_id');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('validated_by');
        });

        //users
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('secretQuestion_id');
        });

    }
}
