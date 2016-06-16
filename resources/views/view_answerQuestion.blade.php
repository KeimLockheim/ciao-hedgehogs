@extends('view_master')

@section('title', 'Répondre à une question')

@section('content')

<div class="row" id="contenu">

  <div class="col-md-12" id="breadcrums">
    <p><a href="/dashboard">Dashboard </a> > Profil expert <strong>{{$user->nickname}}</strong> > Répondre à une question</p>
  </div>
</div>


<div class="col-md-7 designBox">
  <div class="row">

    <h2>Répondre à une question</h2>


    <h3>La question posée</h3>
    <p>
      {{$question->content}}
    </p>

    <h3>Catégorie</h3>
    <p>
      {{$question->domain->name}}
    </p>



    <form id="answerQuestion" method="post" action="/answer">

      <div class="form-group">
        <label for="theme"> Thème précis: </label>
        <select class="form-control" name="theme" id="answerSubDomain">
          @if($question->subDomain != null)
          <option selected value="{{$question->id}}">{{$question->subDomain->name}}</option>
          @else
          <option disabled selected value> {{$user->userProfile->firstName}}, vous pouvez préciser une sous-catégorie. </option>
          @endif
          @foreach ($question->domain->subDomains as $sub)
          <option value="{{$sub->id}}">{{$sub->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="title">Intitulé précis de la question: </label>
        <input class="form-control" id="title" name="titleQuestion" placeholder="Titre de la question (court et clair)">
      </div>

      <div class="form-group">
        <label for="answer">Ma Réponse: </label>
        <textarea class="form-control" rows="6" name="answerQuestion" id="answer"></textarea>
      </div>

      <input type="hidden" name="question_id" value="{{$question->id}}">

      <div class="form-group">
        <div>
          <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Envoyer ma réponse</button>
        </div>
      </div>

    </form>
  </div>
</div>
@stop
