<div class="module-container" id="signInForm">

  <h2>Se connecter (caché en fonction du boutton cliqué plus)</h2>

  <form class="" action="index.html" method="post" id="signIn">
    <div class="form-group">
      <label for="nickname" class="control-label">Pseudo</label>
      <div>
        <input name="nickname" class="form-control" id="nickname" placeholder="Pseudo">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="control-label">Mot de passe</label>
      <div>
        <input type="password" name="password" class="form-control" id="password2" placeholder="Mot de passe">
      </div>
    </div>
    <div class="form-group">
      <div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="rememberMe"> Se souvenir de moi
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div>
        <button type="submit" class="btn btn-primary">Je me connecte</button>
      </div>
        <div>
						<button type="submit" class="btn btn-primary">Créer un compte</button>
				</div>
         <div class="modal-footer">
                        <button type="button" 
                        class="btn btn-xs close" data-dismiss="modal">
                            Fermer</button>
                    </div>
    </div>
  </form>
</div>
