@extends('view_master')
@section('title', 'Dashboard')
@section('content')
	<div class="col-md-11" id="breadcrums">
		<p>Accueil <span class="interBread"></span> Profil Admin <span class="interBread"></span> Liste des topics <span class="interBread"></span> Valider forum</p>
	</div>
	@if ($user->hasGroup('administrator'))
			<!-- ADMIN SECTION -->
	<div class="container">
		<div class="row" id="contenu">
			<div class="col-md-1">
			</div>
			<div class="col-md-11" id="breadcrums">
				<p>Accueil <span class="interBread"></span> Profil administrateur<span class="interBread"></span></p>
			</div>
			<div class="col-md-7 designBox">
				<h2>Gestion</h2>
				<div class="form-group">
					<label for="addDomain">Nouveau domaine: </label>
					<input class="form-control" id="addDomain" placeholder="Domaine">
					<button type="button" class="btn btn-xs gestion">Ajouter</button>
				</div>
				<div class="form-group">
					<label for="addDomain">Nouveau sous-domaine: </label>
					<select class="form-control" name="category" id="categorie">
						<!-- est-ce qu'on fait cette fonction? -->
					</select>
					<input class="form-control" id="addSousDomain" placeholder="Sous-domaine">
					<button type="button" class="btn btn-xs gestion">Ajouter</button>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary" name="addForum" value="add forum">Créer un forum</button>
					<a href="dashboard/topics"><button type="submit" class="btn btn-primary btnBox" name="" value="">Gestion forum</button></a>
				</div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary" name="" value="">Ajouter admin</button>
					<button type="submit" class="btn btn-primary btnBox" name="" value="">Ajouter expert</button>
				</div>
			</div>
			<div class="col-md-offset-1 col-md-4">
				<div class="row">
					<div class="col-md-12 designBox sideBox">
						<h3 class="titreBox">Profil</h3>
						<p><label>Nom:</label> {{$user->userProfile->lastName}}</p>
						<p><label>Prénom:</label> {{$user->userProfile->firstName}}</p>
						<p><label>Pseudo:</label> {{$user->nickname}}</p>
						<button type="button" class="btn btn-xs" id="nicknameChange">Modifier mon pseudo</button>
						<button type="button" class="btn btn-xs" id="passwordChange">Changer mon mot de passe</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- EXPERT SECTION -->
	@elseif ($user->hasGroup('expert'))
		<div class="container">
			<div class="row" id="contenu">
				<div class="col-md-7 designBox">
					<h2>Profil expert</h2>
					<h3>Questions à traiter: </h3>
					<ul class="lienArticle">

						@if($unansweredQuestionsExpert != null)
							@foreach ($unansweredQuestionsExpert as $questionNoAnswer)
								<li>{{$questionNoAnswer->name}}</li>
								<a href="/dashboard/answers/{{$questionNoAnswer->id}}"><button type="button" class="btn btn-xs">Répondre</button></a>
							@endforeach
						@endif


					</ul>
					<h3>Mes questions répondues: </h3>
					<ul class="lienArticle">
						@if($myAnsweredQuestions != null)
							@foreach ($myAnsweredQuestions as $questionAnswered)
								<li><a href="domain/{{$questionAnswered->content}}/question/{{$questionAnswered->id}}">{{$questionAnswered->content}}</a></li>
							@endforeach
						@endif

						<a href="/dashboard/answered/">Afficher toutes mes questions répondues</a>
					</ul>
				</div>
				<div class="col-md-offset-1 col-md-4">
					<div class="row">
						<div class="col-md-12 designBox sideBox">
							<h3 class="titreBox">Profil</h3>
							<p><label>Nom:</label> {{$user->userProfile->lastName}}</p>
							<p><label>Prénom:</label> {{$user->userProfile->firstName}}</p>
							<p><label>Pseudo:</label> {{$user->nickname}}</p>
							<button type="button" class="btn btn-xs">Modifier mon pseudo</button>
							<button type="button" class="btn btn-xs">Changer mon mot de passe</button>
							<h3 class="titreBox">Domaines de compétences</h3>
							<div>
								<ul>
									@foreach ($user->expertInDomains as $domain)
										<li>{{$domain->name}}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- DEFAULT USER SECTION -->
	@else
		<div class="container article">
			<div class="col-md-7 designBox">
				<h2>Gestion de mon activité</h2>
				<h3>Mes questions en attente de réponse </h3>
				<ul class="">
					@if(questionsNotAnswered != null)
						@foreach (questionsNotAnswered as $question)
							<li>{{$question->content}}</li>
						@endforeach
					@endif
				</ul>
				<h3>Mes questions répondues </h3>
				<ul class="">

					@if(questionsAnswered != null)
						@foreach (questionsAnswered as $question)
							<li><a href="/question/Answered">{{$question->content}}</a></li>
						@endforeach
					@endif

				</ul>
				<h3>Mes discussions</h3>
				<ul class="myTopics">
					{{--{{$topicsToValidate = $user->topics->where('validated_by', null)}}
    				{{$topicsValidated = $user->topics->diff($topicsToValidate)}}
    				{{$notRefusedTopics = $user->topics->where('refusedReason', null)}}
    				{{$refusedTopics = $user->topics->diff($notRefusedTopics)}}--}}

					@if(myTopicsValidated != null)
						@foreach (myTopicsValidated as $topic)
							<li><a href="domain/{domain_id}/discussion/{{$topic->id}}">{{$topic->name}}</a></li>
						@endforeach
					@endif

				</ul>
				<h3>Mes discussions refusées</h3>
				<ul class="refusedTopics">
					@if(refusedTopics != null)
						@foreach (refusedTopics as $topic)
							<li>{{$topic->name}}</li>
							<div class="reason">
								{{$topic->refusedReason}}
							</div>
						@endforeach
					@endif
				</ul>
			</div>
			<div class="col-md-offset-1 col-md-4 designBox sideBox">
				<h3 class="titreBox">Profil</h3>
				<div class="col-md-12 imgProfil">
					<img src="img/user.png" alt="logo" class="imgUser">
				</div>
				<div class="col-md-12">
					<p><label>Pseudo:</label> {{$user->nickname}}</p>
					<button type="button" class="btn btn-xs">Modifier mon pseudo</button>
					<button type="button" class="btn btn-xs">Changer mon mot de passe</button>
				</div>
			</div>
		</div>
	@endif
@stop