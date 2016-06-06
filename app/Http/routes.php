<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::resource('user', 'UserController');
Route::resource('group', 'GroupController');
Route::resource('domain', 'DomainController');
Route::resource('secretquestion', 'SecretQuestionController');
Route::resource('serviceapplicatif', 'ServiceApplicatifController');
Route::resource('post', 'PostController');
Route::resource('topic', 'TopicController');
Route::resource('forum', 'ForumController');
Route::resource('answer', 'AnswerController');
Route::resource('question', 'QuestionController');
