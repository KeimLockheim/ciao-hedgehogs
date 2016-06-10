<!--test-->
<!--test-->
<div class="container article" id="addDomain">

  <div class="row" id="contenu">

			  <div class="col-md-12" id="breadcrums">
			  	<p>Dashboard <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Ajouter un domaine d'expertise</p>
			  </div>
  </div>

        <div class="col-md-7 designBox">

                  <h2>Ajouter un domaine</h2>
      <form>

          <div class="form-group">
              <label for="question">Nouveau domaine</label>
              <input type="text" name="newDomain">
          </div>

          <div class="form-group">
              <label for="question">Description du domaine</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
          </div>

          <div class="form-group">
              <label for="question">Contenu de la page</label>
                <textarea class="form-control" rows="6" name="content"></textarea>
          </div>

          <div class="form-group">
 								 <label class="control-label">Ce domaine est il un domaine principal (parent)</label>
 								 <div>
 										 <div class="radio">
 												 <label>
 														 <input type="radio" name="parentDomain" value="oui" id="oui" /> Oui
 												 </label>
 										 </div>
 										 <div class="radio">
 												 <label>
 														 <input type="radio" name="parentDomain" value="non" id="non" /> Non
 												 </label>
 										 </div>
 								 </div>
 						 </div>

          <div class="form-group">
              <label for="categorie">Veuillez choisir un domaine parent</label>
              <select class="form-control" name="parentDomains" id="parentDomains">
                @foreach ($domains->parentDomains() as $domain)
            <option data-id="{{$domain->id}}">{{$domain->name}}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <div>
                  <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Enregistrer un nouveau domaine</button>
              </div>
          </div>


      </form>
        </div>


      </div>
