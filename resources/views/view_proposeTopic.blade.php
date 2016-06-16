@extends('view_master')

@section('title', 'Proposer une discussion')

@section('content')
<div class="container">

  <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p><a href="/hedgehogs/home">Accueil</a> > <a href="/hedgehogs/domain/{{$domain->id}}"></a>{{$domain->name}} > Proposer une discussion</p>
    </div>
  </div>
</div>

<div class="container article">

  <div class="col-md-7 designBox">
    <div class="row">

      <h2>Proposer un sujet de discussion entre jeunes</h2>

      <p>
        Ici, tu proposes un sujet dont tu veux parler avec d’autres jeunes. CIAO ne répond pas dans les forums, mais modère tous les sujets proposés, selon <a>les conditions d’utilisation</a> du site. Ton sujet est validé dans les 24h maximum.

      </p>
    </div>
  </div>

  <div class="col-md-7 designBox">
    <div class="row">
      @if ($userConnected)

      <form  id="proposeTopic" action="/hedgehogs/topic" method="post">
        <div class="form-group">
          <input type="hidden" name="domain_id" value="{{$domain->id}}">
        </div>
        <div class="form-group">
          <label for="sujet">Ma proposition de sujet </label>
          <input class="form-control" id="sujet" name="topicName">
        </div>

        <div class="form-group">
          <label for="post">Mon premier message</label>
          <textarea class="form-control" rows="4" name="topicPost" id="topicPost"></textarea>
        </div>

        <div class="form-group">
          <div>
            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Proposer mon sujet de discussion!</button>
          </div>
        </div>

      </form>
      @else
      <h2>
        Tu dois être connecté pour pouvoir proposer un sujet de disucssion
      </h2>
      <div class="form-group">
        <div>
          <a class="login" data-toggle="modal" data-target="#login"><button type="submit" class="btn btn-primary">Se connecter</button></a>
        </div>
      </div>
      @endif
    </div>
  </div>





  <div class="col-md-offset-1 col-md-4">

    <div class="row">

      <div class="col-md-12 designBox sideBox">
        <!--Vérifier distinction SubDomain vs Domain -->

        <h3>{{$domain->name}}</h3>
        <p>{{$domain->description}}</p>


      </div>

    </div>

  </div>


</div>
@stop
