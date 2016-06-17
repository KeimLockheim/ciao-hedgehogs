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
	Route::get('lost', 'PasswordController@index');

	// enregistrement du nouveau mot de passe
	Route::post('/password/', 'PasswordController@update');


	//login
	Route::post('/auth/login', 'AuthController@login');


    Route::get('/domain/{domain_id}/urgences', 'UrgencyController@indexDomain');
    Route::get('/urgences/', 'UrgencyController@index');

	Route::get('/domain/{domain_id}', 'DomainController@show');

	Route::get('/domain/{domain_id}/discussions', 'DomainController@showTopics');
	Route::get('/domain/{domain_id}/discussion/{discussion_id}', 'TopicController@show');

	Route::get('/propose/{domain_id}', 'TopicController@proposeTopic');
	Route::get('/ask/{domain_id}', 'QuestionController@askQuestion');


	Route::get('/domain/{domain_id}/questions', 'QuestionController@listing');
	Route::get('/domain/{domain_id}/question/{question_id}', 'QuestionController@show');

	Route::get('/user/nicknameCheck/{pseudo}','UserController@nicknameCheck');
	Route::get('/secretQuestion/getSecretQuestion/{pseudo}', 'SecretQuestionController@getSecretQuestion');

	Route::get('/domain/getSubDomains/{domain_id}','DomainController@getSubDomains');

	//Création de user
	Route::get('/user/create','UserController@create');
	Route::post('/user/', 'UserController@store');


	// homepage
	Route::get('/', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});
	Route::get('', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});
	Route::get('/home', function () {
		return view('view_homePage',\App\Models\Menu::getDomains());
	});




	// zone d'utilisateur connecté

	Route::group(['middleware' => ['auth']], function () {

		// API listes de tous les services:

		// enregistrement de topic
		Route::post('/topic', 'TopicController@store');


		//Ajoute un post dans un topic
		Route::post('/post','PostController@store');
		//Créer une question pour les experts
		Route::post('/question','QuestionController@store');


		Route::get('/logout', 'AuthController@logout');
		Route::get('/dashboard', 'UserController@index');

		Route::post('/secretQuestion/', 'SecretQuestionController@store');

		//rendre public une question
		Route::post('/question/setPublic/{question_id}', 'QuestionController@update');



		// routes pour les experts

		Route::group(['middleware' => ['expert']], function () {

			Route::post('/answer/', 'AnswerController@store');

			// répondre à une question
			Route::get('/dashboard/answers/{question_id}', 'QuestionController@answerQuestion');


		});

		// routes pour les admins

		Route::group(['middleware' => ['admin']], function () {

			//Formulaire de création de domain
			Route::get('/addDomain','DomainController@create');
			//Créer un nouveau domain
			Route::post('/domain','DomainController@store');

			// liste des topics
			Route::get('/dashboard/topics', 'TopicController@listTopics');

			//validation d'un topics
			Route::get('/dashboard/topics/validate/{topic_id}', 'TopicController@validateTopic');

			// enregistrer une urgence
			Route::post('/urgency/', 'UrgencyController@store');

			// modifier un topic
			Route::post('/topic/update','TopicController@update');

			//Check si un domain est déjà dans la BD
			Route::get('/domain/domainCheck/{domain}','DomainController@domainCheck');

		});

	});
});
