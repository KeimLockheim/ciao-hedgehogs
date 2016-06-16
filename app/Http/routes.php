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



Route::group(['middleware' => ['web']], function () {

	// password perdu
	Route::get('/hedgehogs/lost', 'PasswordController@index');


	//login
	Route::post('/hedgehogs/auth/login', 'AuthController@login');


    Route::get('/hedgehogs/domain/{domain_id}/urgences', 'UrgencyController@indexDomain');
    Route::get('/hedgehogs/urgences/', 'UrgencyController@index');

	Route::get('/hedgehogs/domain/{domain_id}', 'DomainController@show');

	Route::get('/hedgehogs/domain/{domain_id}/discussions', 'DomainController@showTopics');
	Route::get('/hedgehogs/domain/{domain_id}/discussion/{discussion_id}', 'TopicController@show');

	Route::get('/hedgehogs/propose/{domain_id}', 'TopicController@proposeTopic');
	Route::get('/hedgehogs/ask/{domain_id}', 'QuestionController@askQuestion');


	Route::get('/hedgehogs/domain/{domain_id}/questions', 'QuestionController@listing');
	Route::get('/hedgehogs/domain/{domain_id}/question/{question_id}', 'QuestionController@show');

	Route::get('/hedgehogs/user/nicknameCheck/{pseudo}','UserController@nicknameCheck');
	Route::get('/hedgehogs/secretQuestion/getSecretQuestion/{pseudo}', 'SecretQuestionController@getSecretQuestion');

	Route::get('/hedgehogs/domain/getSubDomains/{domain_id}','DomainController@getSubDomains');

	//Création de user
	Route::get('/hedgehogs/user/create','UserController@create');
	Route::post('/hedgehogs/user/', 'UserController@store');


	// homepage
	Route::get('/', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});
	Route::get('/hedgehogs', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});
	Route::get('/hedgehogs/home', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});




	// zone d'utilisateur connecté

	Route::group(['middleware' => ['auth']], function () {

		// API listes de tous les services:

		// enregistrement de topic
		Route::post('/hedgehogs/topic', 'TopicController@store');
		// enregistrement du nouveau mot de passe
		Route::post('/hedgehogs/password/', 'PasswordController@update');

		//Ajoute un post dans un topic
		Route::post('/hedgehogs/post','PostController@store');
		//Créer une question pour les experts
		Route::post('/hedgehogs/question','QuestionController@store');


		Route::get('/hedgehogs/logout', 'AuthController@logout');
		Route::get('/hedgehogs/dashboard', 'UserController@index');

		Route::post('/hedgehogs/secretQuestion/', 'SecretQuestionController@store');

		//rendre public une question
		Route::post('/hedgehogs/question/setPublic/{question_id}', 'QuestionController@update');



		// routes pour les experts

		Route::group(['middleware' => ['expert']], function () {

			Route::post('/hedgehogs/answer/', 'AnswerController@store');

			// répondre à une question
			Route::get('/hedgehogs/dashboard/answers/{question_id}', 'QuestionController@answerQuestion');


		});

		// routes pour les admins

		Route::group(['middleware' => ['admin']], function () {

			//Formulaire de création de domain
			Route::get('/hedgehogs/addDomain','DomainController@create');
			//Créer un nouveau domain
			Route::post('/hedgehogs/domain','DomainController@store');

			// liste des topics
			Route::get('/hedgehogs/dashboard/topics', 'TopicController@listTopics');

			//validation d'un topics
			Route::get('/hedgehogs/dashboard/topics/validate/{topic_id}', 'TopicController@validateTopic');

			// enregistrer une urgence
			Route::post('/hedgehogs/urgency/', 'UrgencyController@store');

			// modifier un topic
			Route::post('/hedgehogs/topic/update','TopicController@update');

			//Check si un domain est déjà dans la BD
			Route::get('/hedgehogs/domain/domainCheck/{domain}','DomainController@domainCheck');

		});

	});









	//middleware admin









/*	Route::resource('user', 'UserController');
	Route::resource('group', 'GroupController');
	Route::resource('domain', 'DomainController');
	Route::resource('secretquestion', 'SecretQuestionController');
	Route::resource('serviceapplicatif', 'ServiceApplicatifController');
	Route::resource('post', 'PostController');
	Route::resource('topic', 'TopicController');
	Route::resource('forum', 'ForumController');
	Route::resource('answer', 'AnswerController');
	Route::resource('question', 'QuestionController');*/
});
