<div class="container article">

  <div class="row" id="contenu">

			  <div class="col-md-12" id="breadcrums">
			  	<p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Poser une question</p>
			  </div>
  </div>

        <div class="col-md-7 designBox">

                  <h2>Poser une question</h2>
      <form>

          <div class="form-group">
              <label for="categorie"> Catégorie (obligatoire):</label>
              <select class="form-control" name="category" id="categorie">
                @foreach ($parentDomains as $domain)
            <option data-id="{{$domain->id}}">{{$domain->name}}</option>
                @endforeach
          </select>
          </div>

          <div class="form-group">
              <label for="theme"> Thème précis: </label>
              <select class="form-control" name="subcategory" id="theme">
                <option disabled selected value> -- Tu peux préciser une sous-catégorie -- </option>
                <option>Adolescence</option>
                <option>Règles</option>
                <option>Contraception</option>
          </select>
          </div>

          <div class="form-group">
              <label for="question">Ma question: </label>
                <a id="existQuestion" href="#"><button type="button" class="btn btn-xs"> Regarder si ma question existe déjà</button></a>

                <textarea class="form-control" rows="4" name="addQuestion" id="question"></textarea>

          </div>

          <div class="form-group">
              <div>
                  <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Poser ma question!</button>
              </div>
          </div>


      </form>
        </div>


      </div>
