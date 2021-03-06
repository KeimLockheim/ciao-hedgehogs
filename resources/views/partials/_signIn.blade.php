<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">
                           <span aria-hidden="true">&times;
                           </span><span class="sr-only">
                                    Fermer</span></button>

<div class="module-container" id="signInForm">

  <h2>Se connecter</h2>

  <form action="{{url('/auth/login')}}" method="post" id="signIn">
    <div class="form-group">
      <label for="nickname" class="control-label">Pseudo</label>
      <div>
        <input name="nickname" class="form-control" id="nickname" placeholder="Pseudo">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="control-label">Mot de passe</label>
      <div>
        <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
      </div>
    </div>
    <p><a href="{{url('/lost')}}">J'ai oublié mon mot de passe</a></p>
    <div class="form-group">
      <div>
        <button type="submit" class="btn btn-primary">Je me connecte</button>
      </div>
    </div>
  </form>
      <div>
          <a href="{{url('/user/create')}}"><button class="btn btn-primary">Créer un compte</button></a>
      </div>
</div>
        <div class="modal-footer">
              <button type="button" class="btn btn-xs close" data-dismiss="modal">Fermer</button>
        </div>
        </div>
        </div>
      </div>
    </div>
