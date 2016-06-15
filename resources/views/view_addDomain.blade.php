 @extends('view_master')

@section('title', 'Ajouter un domaine')

@section('content')
<div class="container article">

  <div class="row" id="contenu">
			  <div class="col-md-12" id="breadcrums">
			  	<p><a href="/dashboard">Dashboard </a> > Ajouter un domaine d'expertise</p>
			  </div>
  </div>

        <div class="col-md-7 designBox">

                  <h2>Ajouter un domaine</h2>
      <form id="addDomain" method="post" action="/domain">

          <div class="form-group">
              <label for="question">Nouveau domaine</label>
              <input type="text" class="form-control" name="newDomain">
          </div>

          <div class="form-group">
              <label for="question">Description du domaine</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
          </div>

          <div class="form-group">
              <label for="question">Contenu de la page en html</label>
                <textarea class="form-control" rows="6" name="content"></textarea>
          </div>

          <div class="form-group">
 								 <label class="control-label">Ce domaine est il un domaine principal (parent)</label>
 								 <div>
 										 <div class="radio">
 												 <label>
 														 <input type="radio" name="isDomain" value="oui" id="subYes" /> Oui
 												 </label>
 										 </div>
 										 <div class="radio">
 												 <label>
 														 <input type="radio" name="isDomain" value="non" id="subNo" /> Non
 												 </label>
 										 </div>
 								 </div>
 						 </div>

          <div class="form-group sub">
              <label for="categorie">Veuillez choisir un domaine parent</label>
              <select class="form-control" name="parentDomains" id="parentDomains">
                @foreach ($parentDomains as $domain)
            <option data-id="{{$domain->id}}" value="{{$domain->id}}">{{$domain->name}}</option>
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
      @stop
