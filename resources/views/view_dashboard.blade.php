@extends('view_master')
@section('title', 'Dashboard')
@section('content')

@if ($user->hasGroup('administrator'))
<!-- ADMIN SECTION -->

<div class="container">
	<div class="row" id="contenu">
		<div class="col-md-12" id="breadcrums">
			<p><a href="/hedgehogs/home">Accueil</a> > <a href="/hedgehogs/dashboard">Profil administrateur</a></p>
		</div>
	</div>

	<div class="col-md-7 designBox dashboard">
		<div class="row">
			<h2>Gestion du site ciao</h2>


			<div class="col-md-4">
				<a href="/hedgehogs/propose/1"><button type="submit" class="btn btn-primary btnBox" name="addForum" value="add forum"><img src="{{ asset('assets/img/addforum.png') }}" alt="logo" class="imgBtn"><p>Créer un forum</p></button></a>
				<a href="/hedgehogsdashboard/topics"><button type="submit" class="btn btn-primary btnBox"> <img src="{{ asset('assets/img/forum.png') }}" alt="logo" class="imgBtn"><p>Gestion forum</p></button></a>
			</div>

			<div class="col-md-4">
				<button type="submit" class="btn btn-primary btnBox"><img src="{{ asset('assets/img/addUser.png') }}" alt="logo" class="imgBtn"><p>Ajouter admin</p></button>
				<button type="submit" class="btn btn-primary btnBox"><img src="{{ asset('assets/img/addUser.png') }}" alt="logo" class="imgBtn"><p>Ajouter expert</p></button>
			</div>
			<div class="col-md-4">
				<a href="/hedgehogs/addDomain"><button type="submit" class="btn btn-primary btnBox"><img src="{{ asset('assets/img/addDom.png') }}" alt="logo" class="imgBtn"><p>Ajouter domaine</p></button></a>
				<button type="submit" class="btn btn-primary btnBox"><img src="{{ asset('assets/img/addAmb.png') }}" alt="logo" class="imgBtn"><p>Ajouter adresse</p></button>
			</div>




		</div>
	</div>

	<div class="col-md-offset-1 col-md-4">
		<div class="row">
			<div class="col-md-12 designBox sideBox">
				<h3 class="titreBox">Profil</h3>
				<div class="col-md-12 imgProfil">
					<img src="{{ asset('assets/img/user.png') }}" alt="logo" class="imgUser">
				</div>
				<p><label>Nom:</label> {{$user->userProfile->lastName}}</p>
				<p><label>Prénom:</label> {{$user->userProfile->firstName}}</p>
				<p><label>Pseudo:</label> {{$user->nickname}}</p>

			</div>
		</div>
	</div>
</div>


<!-- EXPERT SECTION -->
@elseif ($user->hasGroup('expert'))
<div class="container">
	<div class="row" id="contenu">
		<div class="col-md-12" id="breadcrums">
			<p><a href="/hedgehogs/home">Accueil</a> > <a href="/hedgehogs/dashboard">Profil Expert</a></p>
		</div>
	</div>
	<div class="col-md-7 designBox dashboard">
		<div class="row">
			<h2>Profil expert</h2>
			<h3>Questions à traiter: </h3>
			<ul class="lienArticle">

				@if($unansweredQuestionsExpert != null)
				@foreach ($unansweredQuestionsExpert as $questionNoAnswer)
				<li><strong>{{$questionNoAnswer->questionUser->nickname}}</strong> a posé une question
					<a href="/hedgehogs/dashboard/answers/{{$questionNoAnswer->id}}"><div><button type="button" class="btn btn-xs expertAnswerTo">Répondre</button></div></a>
				</li>

				@endforeach
				@endif


			</ul>
			<h3>Questions répondues: </h3>
			<ul class="lienArticle">
				@if($myAnsweredQuestions != null)
				@foreach ($myAnsweredQuestions as $questionAnswered)
				<li><a href="/hedgehogsdomain/{{$questionAnswered->domain->id}}/question/{{$questionAnswered->id}}">

					{{$questionAnswered->name}}</a></li>
					@endforeach
					@endif

					<a href="#">Afficher toutes mes questions répondues</a>
				</ul>
			</div>
		</div>
		<div class="col-md-offset-1 col-md-4">
			<div class="row">
				<div class="col-md-12 designBox sideBox">
					<h3 class="titreBox">Profil</h3>
					<div class="col-md-12 imgProfil">
						<img src="{{ asset('assets/img/user.png') }}" alt="logo" class="imgUser">
					</div>
					<p><label>Nom:</label> {{$user->userProfile->lastName}}</p>
					<p><label>Prénom:</label> {{$user->userProfile->firstName}}</p>
					<p><label>Pseudo:</label> {{$user->nickname}}</p>
					<h3 class="titreBox">Domaines de compétences</h3>
					<div>
						<ul>
							@foreach ($user->expertInDomains as $dom)
							<li>{{$dom->name}}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- DEFAULT USER SECTION -->
	@else
	<div class="container">
		<div class="row" id="contenu">
			<div class="col-md-12" id="breadcrums">
				<p><a href="/hedgehogs/home">Accueil</a> > <a href="/hedgehogs/dashboard">{{$user->name}}</a></p>
			</div>
		</div>
		<div class="col-md-7 designBox dashboard">
			<div class="row">
				<h2>Gestion de mon activité</h2>
				<h3>Mes questions en attente de réponse </h3>
				<ul class="forValidationQuestions">
					@if($questionsNotAnswered != null)
					@foreach ($questionsNotAnswered as $question)
					<li class="forValidationQuestion">{{$question->content}}</li>
					@endforeach
					@endif
				</ul>
				<h3>Mes questions répondues </h3>
				<ul class="answeredQuestions">
					@if($questionsAnswered != null)
					@foreach ($questionsAnswered as $question)
					<li class="answeredQuestion"><a class="ans" href="/hedgehogsdomain/{{$question->domain->id}}/question/{{$question->id}}">{{$question->content}}</a></li>
					@endforeach
					@endif

				</ul>
				<h3>Mes discussions</h3>
				<ul class="myTopics">


					@if($myTopicsValidated != null)
					@foreach ($myTopicsValidated as $topic)
					<li><a href="/hedgehogsdomain/{{$topic->domain->id}}/discussion/{{$topic->id}}">{{$topic->name}}</a></li>
					@endforeach
					@endif

				</ul>
				<h3>Mes discussions refusées</h3>
				<ul class="refusedTopics">
					@if($refusedTopics != null)
					@foreach ($refusedTopics as $topic)
					<li>{{$topic->name}}</li>
					<div class="reason">
						{{$topic->refusedReason}}
					</div>
					@endforeach
					@endif
				</ul>
			</div>
		</div>
		<div class="col-md-offset-1 col-md-4">
			<div class="row">
				<div class="col-md-12 designBox sideBox">
					<h3 class="titreBox">Profil</h3>
					<div class="col-md-12 imgProfil">
						<img src="{{ asset('assets/img/user.png') }}" alt="logo" class="imgUser">
					</div>
					<p><label>Pseudo:</label> {{$user->nickname}}</p>

				</div>

			</div>
		</div>
	</div>


	@endif
	@stop
