@extends('view_master')

@section('title', 'Répondre à une question')

@section('content')

  <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p><a href="/home">Accueil </a><span class="interBread">></span>Profil expert <strong>{{$user->nickname}}</strong> <span class="interBread">></span> Répondre à une question</p>
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


        <form id="answerQuestion" method="post">

        <div class="form-group">
            <label for="theme"> Thème précis: </label>
            <select class="form-control" name="theme" id="answerSubDomain">
              @foreach ($question->domain->subDomains as $sub)
              @if($question->id == $sub->id)
              <option selected value="{{$sub->id}}">{{$sub->name}}</option>
              <option value="{{$sub->id}}">{{$sub->name}}</option>
              @else
              <option disabled selected value> Vous pouvez préciser un domaine précis </option>
              <option value="{{$sub->id}}">{{$sub->name}}</option>
              @endif
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

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Envoyer ma réponse</button>
            </div>
        </div>

  </form>
</div>
</div>
@stop
