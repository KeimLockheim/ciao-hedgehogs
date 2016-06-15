@extends('view_master')

@section('title', 'Changer son mot de passe')

@section('content')
<div class="module-container">

  <div class="col-md-11" id="breadcrums">
    <p><a href="/home">Accueil</a> > Changer son mot de passe</p>
  </div>

  <h2>Changement de mot de passe</h2>

  <form id="changePassword" action="/password" method="post">
    <div class="form-group">
      <label for="pseudo" class="control-label">Ton pseudo</label>
      <div>
        <input name="nickname" class="form-control" id="pseudo" placeholder="Pseudo">
      </div>
    </div>
    <button id="showQuestion" type="button" class="btn btn-xs">Afficher ma question secrète</button>
    <div id="secreteQ" class="form-group">
      <label for="pseudo" class="control-label">Question secrète</label>
      <div>
        <input name="secreteQuestion" class="form-control" id="secreteQuestion" placeholder="Ton pseudo n'est pas valide!" disabled>
      </div>
    </div>
    <div class="form-group">
      <label for="answerSecrete" class="control-label">Ta réponse</label>
      <div>
        <input name="answerQuestion" class="form-control" id="secreteQuestion" placeholder="Ta réponse ici">
      </div>
    </div>

    <div class="form-group">
      <label for="password2" class="control-label">Nouveau mot de passe</label>
      <div>
        <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
      </div>
      <div class="progress password-progress">
        <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
      </div>
    </div>
    <div class="form-group">
      <div>
        <button type="submit" class="btn btn-primary">Changer mon mot de passe</button>
      </div>
    </div>
  </form>
</div>
@stop
