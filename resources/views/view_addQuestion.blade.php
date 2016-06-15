@extends('view_master')

@section('title', 'Poser une question')

@section('content')
<div class="container article">



  <div class="row" id="contenu">

			  <div class="col-md-12" id="breadcrums">
			  	<p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Poser une question</p>
			  </div>
  </div>

          <div class="col-md-7 designBox">
                                <div class="row">

                  <h2>Poser une question</h2>

          <p>
         Tu te poses des questions et n’as pas envie de t’adresser à tes parents? Peut-être ne sais-tu pas où trouver la réponse? Nos experts se feront une joie de pouvoir y répondre, et ça dans les 48 heures!
<p>N’hésite pas à nous soumettre tes questions, c’est 100% gratuit et nos conseillers feront leur maximum pour éclairer tes lanternes.</p>
<p>Remarque: Peut-être que quelqu’un nous a déjà soumis la même question. Pense à aller jeter un œil sur les forums ou les questions posées par d’autres utilisateurs.
Pour toutes les questions sur les métiers (choix d'un métier, description, études pour y parvenir...), regarde le site <a href="http://www.orientation.ch">www.orientation.ch</a>.</p>


          </p>
                                    <a id="existQuestion" href="/domain/{{$domain->id}}/questions"><button type="button" class="btn btn-xs">Regarder si ma question existe déjà</button></a>
    </div>
        </div>



        <div class="col-md-7 designBox">
            <div class="row">
      <form id="addQuestion" action="/question" method="post">

        <div class="form-group">
              <label for="categorie"> Catégorie (obligatoire): </label>
            <select class="form-control" name="domain" id="categorie">
              <option value="{{$domain->id}}" data-id="{{$domain->id}}">{{$domain->name}}</option>
              @foreach ($parentDomains as $dom)
              @if($dom->id != $domain->id)
              <option value="{{$dom->id}}" data-id="{{$dom->id}}">{{$dom->name}}</option>
              @endif
              @endforeach
            </select>
        </div>

          <div class="form-group">
              <label for="theme"> Thème précis: </label>
              <select class="form-control" name="subDomain" id="theme">
                <option disabled selected value> Tu peux préciser une sous-catégorie </option>
              </select>
          </div>

          <div class="form-group">
              <label for="question">Ma question: </label>



                <textarea class="form-control" rows="4" name="content" id="question"></textarea>

          </div>

          <div class="form-group">
              <div>
                  <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Poser ma question!</button>
              </div>
          </div>


      </form>

        </div>
          </div>


      </div>
      @stop
