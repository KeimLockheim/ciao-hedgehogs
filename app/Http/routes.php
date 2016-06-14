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
	return view('view_homePage',\App\Models\Menu::getDomains());
});


// routes pour les vues

// accessible à tous


Route::get('/home', function () {
	return view('view_homePage',\App\Models\Menu::getDomains());
});

Route::get('/lost', function () {
	// est-ce qu'on besoin d'une vue ou c'est toujours présent? //Je ne comprends pas ce commentaire.
	return view('view_lostPassword',\App\Models\Menu::getDomains());
});



Route::group(['middleware' => ['web']], function () {

    Route::get('/domain/{domain_id}/urgences', 'UrgencyController@indexDomain');
    Route::get('/urgences/', 'UrgencyController@index');

	Route::get('/domain/{domain_id}', 'DomainController@show');
	Route::get('/categories/{id}', 'CategoryController@show');

	Route::get('/domain/{domain_id}/discussions', 'DomainController@showTopics');
	Route::get('/domain/{domain_id}/discussion/{discussion_id}', 'TopicController@show');

	Route::get('/propose/{domain_id}', 'TopicController@proposeTopic');
	Route::get('/ask/{domain_id}', 'QuestionController@askQuestion');

	Route::get('/domain/{domain_id}/questions', 'QuestionController@listing');
	Route::get('/domain/{domain_id}/question/{question_id}', 'QuestionController@show');
	Route::get('/ask/{domain_id}', 'QuestionController@askQuestion');

	Route::get('/user/nicknameCheck/{pseudo}','UserController@nicknameCheck');
	Route::get('/secretQuestion/getSecretQuestion/{pseudo}', 'SecretQuestionController@getSecretQuestion');

	Route::get('/domain/getSubDomains/{domain_id}','DomainController@getSubDomains');

	Route::get('/', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});
	Route::get('/home', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});

	Route::get('/login', function () {
		return view('view_signIn',App\Models\Menu::getDomains());

	});

	Route::post('/auth/login', 'AuthController@login');

	Route::group(['middleware' => ['auth']], function () {

		Route::get('logout', 'AuthController@logout');

		Route::group(['middleware' => ['acl']], function () {


		});
	});


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
	Route::post('/answer/', 'AnswerController@store');
	Route::post('/urgency/', 'UrgencyController@store');



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
