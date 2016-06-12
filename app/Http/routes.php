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


// routes pour les vues

// accessible à tous


Route::get('/home', function () {
	return view('view_homepage');
});

Route::get('/lost', function () {
	// est-ce qu'on besoin d'une vue ou c'est toujours présent? //Je ne comprends pas ce commentaire.
	return view('view_lostPassword');
});




Route::group(['middleware' => ['web']], function () {


	Route::get('/domain/{domain_id}', 'DomainController@show');
	Route::get('/categories/{id}', 'CategoryController@show');

	Route::get('/domain/{domain_id}/discussions', 'DomainController@showTopics');
	Route::get('/domain/{domain_id}/discussion/{discussion_id}', 'TopicController@show');

	Route::get('/propose/{domain_id}', 'TopicController@proposeTopic');

	Route::get('/domain/{domain_id}/questions', 'QuestionController@listing');
	Route::get('/domain/{domain_id}/question/{question_id}', 'QuestionController@show');
	Route::get('/ask/{domain_id}', 'QuestionController@askQuestion');

	Route::get('/user/nicknameExists/{nickname}','UserController@nicknameExists');
	Route::post('/user/','UserController@store');


	// middleware connecté

	Route::get('/dashboard', 'UserController@index');
	Route::post('/post/', 'PostController@store');
	Route::post('/question/','QuestionController@store');
	Route::post('/topic/','TopicController@store');

	//middleware admin

	Route::get('/dashboard/topics', 'TopicController@listTopics');
	Route::get('/dashboard/topics/validate/{topic_id}', 'TopicController@validateTopic');

	Route::get('/dashboard/answers/{question_id}', 'QuestionController@answerQuestion');

	Route::post('/domain/', 'DomainController@store');
	Route::post('/secretQuestion/', 'SecretQuestionController@store');



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
});