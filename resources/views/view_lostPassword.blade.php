@extends('view_master')

@section('title', 'Changer son mot de passe')

@section('content')
<div class="module-container">

  <div class="col-md-11" id="breadcrums">
    <p>Accueil <span class="interBread">></span> Changer son mot de passe</p>
  </div>

  <h2>Changement de mot de passe</h2>

  <form id="changePassword">
    <div class="form-group">
      <label for="pseudo" class="control-label">Ton pseudo</label>
      <div>
        <input name="nickname" class="form-control" id="pseudo" placeholder="Pseudo">
      </div>
    </div>
    <div class="form-group">
      <label for="pseudo2" class="control-label">Question secrète</label>
      <div>
        <input name="secreteQuestion" id="secreteQuestion" placeholder="Question Secrète à Afficher enfonction du pseudo" disabled>
      </div>
    </div>
    <div class="form-group">
      <label for="answerSecrete" class="control-label">Ta réponse</label>
      <div>
        <input name="answerQuestion" id="secreteQuestion" placeholder="Ta réponse ici">
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
